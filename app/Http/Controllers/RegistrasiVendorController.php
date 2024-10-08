<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorPeroranganDataTable;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Master\KategoriVendor;
use App\Models\Provinsi;
use App\Models\RegistrasiVendor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

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
        $title = ' ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('menu.registrasi-vendor.create')],
        ];
        $stmtKategoriVendor = KategoriVendor::isActive()->orderBy('nama')->get();
        $stmtProvinsi = Provinsi::isActive()->orderBy('nama')->get();


        return view('menu.vendor-perorangan.create', compact('title', 'breadcrumbs','stmtKategoriVendor','stmtProvinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function getKabKotaByProvinsi(Request $request): \Illuminate\Http\JsonResponse
    {
        $kabKota = KabKota::where('kode_provinsi', $request->kode_provinsi)->aktif()->get();
        return response()->json($kabKota);
    }
    public function getKecamatanByKabKota(Request $request): \Illuminate\Http\JsonResponse
    {
        $kecamatan = Kecamatan::where('kode_kab_kota', $request->kode_kabupaten_kota)->aktif()->get();
        return response()->json($kecamatan);
    }
    public function getKelurahanByKecamatan(Request $request): \Illuminate\Http\JsonResponse
    {
        $kelurahan = Kelurahan::where('kode_kecamatan', $request->kode_kecamatan)->aktif()->get();
        return response()->json($kelurahan);
    }
}
