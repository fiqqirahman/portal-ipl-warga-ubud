<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorPeroranganDataTable;
use App\Enums\DocumentForEnum;
use App\Enums\PermissionEnum;
use App\Enums\StatusRegistrasiEnum;
use App\Http\Requests\RegistrasiVendor\Individual\RegistrasiVendorIndividualStoreRequest;
use App\Http\Requests\RegistrasiVendor\Individual\RegistrasiVendorIndividualUpdateRequest;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Master\Bank;
use App\Models\Master\DokumenVendor;
use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
use App\Models\Master\KualifikasiGrade;
use App\Models\Master\Negara;
use App\Models\Master\SubBidangUsaha;
use App\Models\Provinsi;
use App\Models\RegistrasiVendor;
use App\Services\DocumentService;
use App\Services\UploadFileService;
use Auth;
use DB;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class RegistrasiVendorController extends Controller
{
    private static string $title = 'Registrasi Vendor Perorangan';

    static function breadcrumb()
    {
        return [
            self::$title, route('menu.registrasi-vendor.index')
        ];
    }

    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(VendorPeroranganDataTable $dataTable)
    {
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('menu.vendor-perorangan.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize(PermissionEnum::RegistrasiVendorCreate->value);
		
		if(!allowCreateRegistration()){
			abort(403, 'You has already have filled form!');
		}
		
        $title = self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            ['Create', route('menu.registrasi-vendor.create')],
        ];
		
        $stmtKategoriVendor = KategoriVendor::isActive()->orderBy('nama')->get();
        $stmtProvinsi = Provinsi::isActive()->orderBy('nama')->get();
        $stmtNegara = Negara::isActive()->orderBy('nama')->get();
        $stmtBank = Bank::isActive()->orderBy('nama')->get();
        $stmtJenisVendor = JenisVendor::isActive()->orderBy('nama')->get();
        $stmtSubBidangUsaha = SubBidangUsaha::isActive()->orderBy('nama')->get();
        $stmtKualifikasiGrade = KualifikasiGrade::isActive()->orderBy('nama')->get();

        $data = [
			'title' => $title,
			'breadcrumbs' => $breadcrumbs,
			'stmtKategoriVendor' => $stmtKategoriVendor,
			'stmtProvinsi' => $stmtProvinsi,
            'stmtNegara' => $stmtNegara,
            'stmtBank' => $stmtBank,
            'stmtJenisVendor' => $stmtJenisVendor,
            'stmtSubBidangUsaha' => $stmtSubBidangUsaha,
            'stmtKualifikasiGrade' => $stmtKualifikasiGrade,
            'documentsField' => DocumentService::makeFields(DocumentForEnum::Individual),
	        'masterKabKota' => KabKota::isActive()->select(['kode', 'nama'])->get()
		];

        return view('menu.vendor-perorangan.create', $data);
    }
	
	/**
	 * Store a newly created resource in storage.
	 * @throws Throwable
	 */
    public function store(RegistrasiVendorIndividualStoreRequest $request)
    {
        try {
	        $this->authorize(PermissionEnum::RegistrasiVendorCreate->value);
	        
	        if(!allowCreateRegistration()){
		        abort(403, 'You has already have filled form!');
	        }

            DB::beginTransaction();
	        
	        $statusRegistrasi = $request->confirm_done_checkbox === 'on' ? StatusRegistrasiEnum::Analysis : StatusRegistrasiEnum::Draft;
	        
	        $requestData = [
		        ...$request->validated(),
		        'status_registrasi' => $statusRegistrasi,
		        'created_by' => Auth::id()
	        ];

	        $create = RegistrasiVendor::create($requestData);

	        $create->storeDocuments($request->file());
	        
	        $create->upsertPengalamanKerja($request->pengalaman3TahunTerakhir ?? []);
	        $create->upsertPengalamanKerja($request->pengalamanMitraUsaha ?? []);
	        $create->upsertPengalamanKerja($request->pengalamanPekerjaanBerjalan ?? []);
			
			if($create->status_registrasi === StatusRegistrasiEnum::Analysis){
				sweetAlert('success', 'Berhasil Submit Data');
			} else {
				sweetAlert('success', 'Berhasil Menyimpan Data ke Draft');
			}
			
			DB::commit();
			
			return to_route('menu.registrasi-vendor.index');
        } catch (Throwable $th) {
			DB::rollBack();
			
			sweetAlertException('Gagal Menyimpan Data', $th);
			
			return to_route('menu.registrasi-vendor.create')->withInput();
        }
    }
	
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrasiVendor $registrasiVendor)
    {
	    $this->authorize(PermissionEnum::RegistrasiVendorEdit->value);
	    
	    if(!in_array($registrasiVendor->status_registrasi->value, [StatusRegistrasiEnum::Draft->value, StatusRegistrasiEnum::RevisionDocuments->value])){
			abort(403, 'Registration Already Submitted! Can\'t be edited.');
		}
		
		if($registrasiVendor->created_by !== Auth::id()){
			abort(403);
		}
		
	    $title =  'Edit ' . self::$title;
	    
	    $breadcrumbs = [
		    HomeController::breadcrumb(),
		    self::breadcrumb(),
		    ['Edit', route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)])],
	    ];
		
        $stmtNegara = Negara::isActive()->orderBy('nama')->get();
        $stmtBank = Bank::isActive()->orderBy('nama')->get();
        $stmtJenisVendor = JenisVendor::isActive()->orderBy('nama')->get();
        $stmtKualifikasiGrade = KualifikasiGrade::isActive()->orderBy('nama')->get();
	    
	    $stmtKategoriVendor = KategoriVendor::isActive()->orderBy('nama')->get();
	    $stmtProvinsi = Provinsi::isActive()->orderBy('nama')->get();
	    $stmtSubBidangUsaha = SubBidangUsaha::isActive()->orderBy('nama')->get();
	    
	    $data = [
		    'title' => $title,
		    'breadcrumbs' => $breadcrumbs,
            'stmtKategoriVendor' => $stmtKategoriVendor,
            'stmtProvinsi' => $stmtProvinsi,
            'stmtNegara' => $stmtNegara,
            'stmtBank' => $stmtBank,
            'stmtJenisVendor' => $stmtJenisVendor,
            'stmtSubBidangUsaha' => $stmtSubBidangUsaha,
            'stmtKualifikasiGrade' => $stmtKualifikasiGrade,
		    'documentsField' => DocumentService::makeFields(DocumentForEnum::Individual, $registrasiVendor),
		    'registrasiVendor' => $registrasiVendor,
		    'masterKabKota' => KabKota::isActive()->select(['kode', 'nama'])->get(),
	    ];
	    
	    return view('menu.vendor-perorangan.edit', $data);
    }
	
	/**
	 * Update the specified resource in storage.
	 * @throws Throwable
	 */
    public function update(RegistrasiVendorIndividualUpdateRequest $request, RegistrasiVendor $registrasiVendor)
    {
	    try {
		    $this->authorize(PermissionEnum::RegistrasiVendorEdit->value);
		    
		    if(!in_array($registrasiVendor->status_registrasi->value, [StatusRegistrasiEnum::Draft->value, StatusRegistrasiEnum::RevisionDocuments->value])){
			    abort(403, 'Registration Already Submitted! Can\'t be edited.');
		    }
		    
		    if($registrasiVendor->created_by !== Auth::id()){
			    abort(403);
		    }
			
		    DB::beginTransaction();
		    
		    $statusRegistrasi = $request->confirm_done_checkbox === 'on' ? StatusRegistrasiEnum::Analysis : StatusRegistrasiEnum::Draft;
		    
		    $requestData = [
			    ...$request->validated(),
			    'status_registrasi' => $statusRegistrasi,
			    'updated_by' => Auth::id()
		    ];
		    
		    $registrasiVendor->update($requestData);
			
		    $registrasiVendor->updateDocuments($request->file());
		    
		    $registrasiVendor->upsertPengalamanKerja($request->pengalaman3TahunTerakhir ?? []);
		    $registrasiVendor->upsertPengalamanKerja($request->pengalamanMitraUsaha ?? []);
		    $registrasiVendor->upsertPengalamanKerja($request->pengalamanPekerjaanBerjalan ?? []);
		    
		    DB::commit();
			
		    if($registrasiVendor->status_registrasi == StatusRegistrasiEnum::Draft){
			    sweetAlert('success', 'Berhasil Mengupdate Data');
			    
			    return to_route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)]);
		    }
		    sweetAlert('success', 'Berhasil Submit Data');
		    
		    return to_route('menu.registrasi-vendor.index');
	    } catch (Throwable $th) {
		    DB::rollBack();
		    
		    sweetAlertException('Gagal Mengupdate Data', $th);
		    
		    return to_route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)])->withInput();
	    }
    }
	
	public function removeDocument(DokumenVendor $dokumenVendor)
	{
		session()->flash('last_opened_tab', 'kt_contact_view_documents');
		
		try {
			$dokumenVendor->delete();
			
			UploadFileService::delete($dokumenVendor->path);
			
			
			sweetAlert('success', 'Berhasil Menghapus Dokumen ' . $dokumenVendor->nama_dokumen);
			
			return to_route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($dokumenVendor->vendor->id)]);
		} catch (Exception $e) {
			sweetAlertException('Gagal Menghapus Dokumen ' . $dokumenVendor->nama_dokumen, $e);
			
			return to_route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($dokumenVendor->vendor->id)]);
		}
	}
	
    public function getKabKotaByProvinsi(Request $request): JsonResponse
    {
        $kabKota = KabKota::where('kode_provinsi', $request->kode_provinsi)->aktif()->get();
        return response()->json($kabKota);
    }
	
    public function getKecamatanByKabKota(Request $request): JsonResponse
    {
        $kecamatan = Kecamatan::where('kode_kab_kota', $request->kode_kabupaten_kota)->aktif()->get();
        return response()->json($kecamatan);
    }
	
    public function getKelurahanByKecamatan(Request $request): JsonResponse
    {
        $kelurahan = Kelurahan::where('kode_kecamatan', $request->kode_kecamatan)->aktif()->get();
        return response()->json($kelurahan);
    }
    public function show(RegistrasiVendor $registrasiVendor)
    {
        $this->authorize(PermissionEnum::RegistrasiVendorDetail->value);

        if($registrasiVendor->created_by !== Auth::id()){
            abort(403);
        }

        $title =  'Detail ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            ['Detail', route('menu.registrasi-vendor.show', ['registrasi_vendor' => enkrip($registrasiVendor->id)])],
        ];

        $stmtSubBidangUsaha = SubBidangUsaha::isActive()->orderBy('nama')->get();
        $stmtKategoriVendor = KategoriVendor::isActive()->orderBy('nama')->get();
			
        $data = [
            'title' => $title,
            'breadcrumbs' => $breadcrumbs,
            'documentsField' => DocumentService::makeFields(DocumentForEnum::Individual, $registrasiVendor),
            'registrasiVendor' => $registrasiVendor,
	        'stmtKategoriVendor' => $stmtKategoriVendor,
	        'stmtSubBidangUsaha' => $stmtSubBidangUsaha,
	        'masterKabKota' => KabKota::isActive()->select(['kode', 'nama'])->get()
        ];

        return view('menu.vendor-perorangan.show', $data);    }
}
