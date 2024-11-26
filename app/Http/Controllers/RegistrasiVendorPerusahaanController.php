<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorPerusahaanDataTable;
use App\Enums\DocumentForEnum;
use App\Enums\PermissionEnum;
use App\Enums\StatusRegistrasiEnum;
use App\Http\Requests\RegistrasiVendor\Company\RegistrasiVendorCompanyUpdateRequest;
use App\Http\Requests\RegistrasiVendor\Company\RegistrasiVendorCompanyStoreRequest;
use App\Models\Master\DokumenVendor;
use App\Models\Master\JabatanVendor;
use App\Models\Master\JenisIdentitas;
use App\Models\Master\KategoriVendor;
use App\Models\Provinsi;
use App\Models\RegistrasiVendor;
use App\Services\DocumentService;
use App\Services\UploadFileService;
use Auth;
use DB;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Throwable;

class RegistrasiVendorPerusahaanController extends Controller
{
    private static string $title = 'Registrasi Vendor Perusahaan';

    static function breadcrumb()
    {
        return [
            self::$title, route('menu.registrasi-vendor-perusahaan.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(VendorPerusahaanDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::RegistrasiVendorAccess->value);
		
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('menu.vendor-perusahaan.index', compact('title', 'breadcrumbs'));
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
			['Create', route('menu.registrasi-vendor-perusahaan.create')],
		];
		
		$stmtKategoriVendor = KategoriVendor::isActive()->orderBy('nama')->get();
		$stmtProvinsi = Provinsi::isActive()->orderBy('nama')->get();
		
		$data = [
			'title' => $title,
			'breadcrumbs' => $breadcrumbs,
			'stmtKategoriVendor' => $stmtKategoriVendor,
			'stmtProvinsi' => $stmtProvinsi,
			'documentsField' => DocumentService::makeFields(DocumentForEnum::Company),
			'vendorJenisIdentitas' => JenisIdentitas::isActive()->select(['kode', 'nama'])->get(),
			'vendorJabatan' => JabatanVendor::isActive()->select(['kode', 'nama'])->get()
		];
		
		return view('menu.vendor-perusahaan.create', $data);
	}
	
	/**
	 * Store a newly created resource in storage.
	 * @throws Throwable
	 */
	public function store(RegistrasiVendorCompanyStoreRequest $request)
	{
		try {
			$this->authorize(PermissionEnum::RegistrasiVendorCreate->value);
			
			if(!allowCreateRegistration()){
				abort(403, 'You has already have filled form!');
			}
			
			DB::beginTransaction();
			
			$statusRegistrasi = $request->confirm_done_checkbox === 'on' ? StatusRegistrasiEnum::Analysis : StatusRegistrasiEnum::Draft;
			
			$create = RegistrasiVendor::create([
				'nama' => $request->nama,
				'nama_singkatan' => $request->nama_singkatan,
				'npwp' => $request->npwp,
				'status_registrasi' => $statusRegistrasi,
				'daftar_komisaris' => json_encode($request->daftar_komisaris),
				'daftar_direksi' => json_encode($request->daftar_direksi),
				'created_by' => Auth::id()
			]);
			
			$create->storeDocuments($request->file());
			
			if($create->status_registrasi === StatusRegistrasiEnum::Analysis){
				sweetAlert('success', 'Berhasil Submit Data');
			} else {
				sweetAlert('success', 'Berhasil Menyimpan Data ke Draft');
			}
			
			DB::commit();
			
			return to_route('menu.registrasi-vendor-perusahaan.index');
		} catch (Throwable $th) {
			DB::rollBack();
			
			sweetAlertException('Gagal Menyimpan Data', $th);
			
			return to_route('menu.registrasi-vendor-perusahaan.create');
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
			['Edit', route('menu.registrasi-vendor-perusahaan.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)])],
		];
		
		$stmtKategoriVendor = KategoriVendor::isActive()->orderBy('nama')->get();
		$stmtProvinsi = Provinsi::isActive()->orderBy('nama')->get();
		
		$data = [
			'title' => $title,
			'breadcrumbs' => $breadcrumbs,
			'stmtKategoriVendor' => $stmtKategoriVendor,
			'stmtProvinsi' => $stmtProvinsi,
			'documentsField' => DocumentService::makeFields(DocumentForEnum::Company, $registrasiVendor),
			'registrasiVendor' => $registrasiVendor,
			'vendorJenisIdentitas' => JenisIdentitas::isActive()->select(['kode', 'nama'])->get(),
			'vendorJabatan' => JabatanVendor::isActive()->select(['kode', 'nama'])->get()
		];
		
		// dd($data['vendorJabatan']->toJson());
		
		return view('menu.vendor-perusahaan.edit', $data);
	}
	
	/**
	 * Update the specified resource in storage.
	 * @throws Throwable
	 */
	public function update(RegistrasiVendorCompanyUpdateRequest $request, RegistrasiVendor $registrasiVendor)
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
			
			$registrasiVendor->update([
				'nama' => $request->nama,
				'nama_singkatan' => $request->nama_singkatan,
				'npwp' => $request->npwp,
				'status_registrasi' => $statusRegistrasi,
				'daftar_komisaris' => json_encode($request->daftar_komisaris),
				'daftar_direksi' => json_encode($request->daftar_direksi),
				'updated_by' => Auth::id()
			]);
			
			$registrasiVendor->updateDocuments($request->file());
			
			DB::commit();
			
			if($registrasiVendor->status_registrasi == StatusRegistrasiEnum::Draft){
				sweetAlert('success', 'Berhasil Mengupdate Data');
				
				return to_route('menu.registrasi-vendor-perusahaan.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)]);
			}
			sweetAlert('success', 'Berhasil Submit Data');
			
			return to_route('menu.registrasi-vendor-perusahaan.index');
		} catch (Throwable $th) {
			DB::rollBack();
			
			sweetAlertException('Gagal Mengupdate Data', $th);
			
			return to_route('menu.registrasi-vendor-perusahaan.edit', ['registrasi_vendor' => enkrip($registrasiVendor->id)]);
		}
	}
	
	public function removeDocument(DokumenVendor $dokumenVendor)
	{
		session()->flash('last_opened_tab', 'kt_contact_view_documents');
		
		try {
			$dokumenVendor->delete();
			
			UploadFileService::delete($dokumenVendor->path);
			
			
			sweetAlert('success', 'Berhasil Menghapus Dokumen ' . $dokumenVendor->nama_dokumen);
			
			return to_route('menu.registrasi-vendor-perusahaan.edit', ['registrasi_vendor' => enkrip($dokumenVendor->vendor->id)]);
		} catch (Exception $e) {
			sweetAlertException('Gagal Menghapus Dokumen ' . $dokumenVendor->nama_dokumen, $e);
			
			return to_route('menu.registrasi-vendor-perusahaan.edit', ['registrasi_vendor' => enkrip($dokumenVendor->vendor->id)]);
		}
	}
}
