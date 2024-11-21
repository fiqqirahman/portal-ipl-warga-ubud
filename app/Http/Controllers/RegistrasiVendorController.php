<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorPeroranganDataTable;
use App\Http\Requests\RegistrasiVendor\Individual\RegistrasiVendorIndividualStoreRequest;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Master\KategoriVendor;
use App\Models\Provinsi;
use App\Models\RegistrasiVendor;
use App\Services\DocumentService;
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
        $this->authorize('registrasi_vendor_access');
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
        $this->authorize('registrasi_vendor_access');
        $title = self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('menu.registrasi-vendor.create')],
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

        return view('menu.vendor-perorangan.create-new', $data);
    }
	
	/**
	 * Store a newly created resource in storage.
	 * @throws Throwable
	 */
    public function store(RegistrasiVendorIndividualStoreRequest $request)
    {
        try {
			DB::beginTransaction();
			
			$isDraft = $request->confirm_done_checkbox === 'on';
			
			$create = RegistrasiVendor::create([
				'nama' => $request->nama,
				'nama_singkatan' => $request->nama_singkatan,
				'is_company' => false,
				'is_draft' => !$isDraft
			]);
			
			$create->refresh();
			
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistrasiVendor $registrasiVendor)
    {
        //
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
