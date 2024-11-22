<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorPeroranganDataTable;
use App\Enums\PermissionEnum;
use App\Http\Requests\RegistrasiVendor\Individual\RegistrasiVendorIndividualStoreRequest;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Master\KategoriVendor;
use App\Models\Provinsi;
use App\Models\RegistrasiVendor;
use App\Services\DocumentService;
use Auth;
use DB;
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
        $this->authorize(PermissionEnum::RegistrasiVendorAccess->value);
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
		
		$data = [
			'title' => $title,
			'breadcrumbs' => $breadcrumbs,
			'stmtKategoriVendor' => $stmtKategoriVendor,
			'stmtProvinsi' => $stmtProvinsi,
			'documentsField' => DocumentService::makeFields(true)
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
			
			$isDraft = $request->confirm_done_checkbox === 'on';
			
			$create = RegistrasiVendor::create([
				'nama' => $request->nama,
				'nama_singkatan' => $request->nama_singkatan,
				'is_company' => false,
				'is_draft' => !$isDraft,
				'created_by' => Auth::id()
			]);
			
	        $create->storeDocuments($request->file());
			
			if(!$isDraft){
				sweetAlert('success', 'Berhasil Submit Data');
			} else {
				sweetAlert('success', 'Berhasil Menyimpan Data ke Draft');
			}
			
			DB::commit();
			
			return to_route('menu.registrasi-vendor.index');
        } catch (Throwable $th) {
			DB::rollBack();
			
			sweetAlertException('Gagal Menyimpan Data', $th);
			
			return to_route('menu.registrasi-vendor.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrasiVendor $registrasiVendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrasiVendor $registrasiVendor)
    {
	    $this->authorize(PermissionEnum::RegistrasiVendorEdit->value);
		
		if(!$registrasiVendor->is_draft){
			abort(403, 'Registration Already Submitted! Can\'t be edited.');
		}
		
	    $title =  'Edit ' . self::$title;
	    
	    $breadcrumbs = [
		    HomeController::breadcrumb(),
		    self::breadcrumb(),
		    ['Edit', route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)])],
	    ];
	    
	    $stmtKategoriVendor = KategoriVendor::isActive()->orderBy('nama')->get();
	    $stmtProvinsi = Provinsi::isActive()->orderBy('nama')->get();
	    
	    $data = [
		    'title' => $title,
		    'breadcrumbs' => $breadcrumbs,
		    'stmtKategoriVendor' => $stmtKategoriVendor,
		    'stmtProvinsi' => $stmtProvinsi,
		    'documentsField' => DocumentService::makeFields(true, $registrasiVendor),
		    'registrasiVendor' => $registrasiVendor
	    ];
	    
	    return view('menu.vendor-perorangan.edit', $data);
    }
	
	/**
	 * Update the specified resource in storage.
	 * @throws Throwable
	 */
    public function update(Request $request, RegistrasiVendor $registrasiVendor)
    {
	    try {
		    $this->authorize(PermissionEnum::RegistrasiVendorEdit->value);
		    
		    if(!$registrasiVendor->is_draft){
			    abort(403, 'Registration Already Submitted! Can\'t be edited.');
		    }
			
		    DB::beginTransaction();
		    
		    $isDraft = $request->confirm_done_checkbox === 'on';
		    
		    $registrasiVendor->update([
			    'nama' => $request->nama,
			    'nama_singkatan' => $request->nama_singkatan,
			    'is_draft' => !$isDraft,
			    'updated_by' => Auth::id()
		    ]);
			
		    $registrasiVendor->updateDocuments($request->file());
		    
		    DB::commit();
			
		    if($registrasiVendor->is_draft){
			    sweetAlert('success', 'Berhasil Mengupdate Data');
			    
			    return to_route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)]);
		    }
		    sweetAlert('success', 'Berhasil Submit Data');
		    
		    return to_route('menu.registrasi-vendor.index');
	    } catch (Throwable $th) {
		    DB::rollBack();
		    
		    sweetAlertException('Gagal Mengupdate Data', $th);
		    
		    return to_route('menu.registrasi-vendor.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)]);
	    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrasiVendor $registrasiVendor)
    {
        //
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
}
