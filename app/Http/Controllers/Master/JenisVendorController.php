<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\JenisVendorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\JenisVendorRequest;
use App\Models\Master\JenisVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JenisVendorController extends Controller
{
    private static $title = 'Jenis Vendor';

    static function breadcrumb()
    {
        return [
            self::$title, route('master.jenis-vendor.index')
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(JenisVendorDataTable $dataTable)
    {
        $this->authorize('master_jenis_vendor_access');
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.jenis-vendor.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('master_jenis_vendor_access');
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-vendor.create')],
        ];

        return view('master.jenis-vendor.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JenisVendorRequest $request)
    {
        $this->authorize('master_jenis_vendor_create');
        JenisVendor::create($request->validated() + ['created_by' => Auth::id()]);

        createLogActivity('Membuat Master Data Jenis Vendor');

        return Redirect::route('master.jenis-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Vendor berhasil dibuat");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('master_jenis_vendor_edit');
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtJenisVendor = JenisVendor::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-vendor.edit', enkrip($id))],
        ];


        return view('master.jenis-vendor.edit', compact('title', 'breadcrumbs', 'stmtJenisVendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisVendorRequest $request, string $id)
    {
        $this->authorize('master_jenis_vendor_edit');
        $id = dekrip($id);
        $stmtJenisVendor = JenisVendor::find($id);
        $stmtJenisVendor->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Data Jenis Vendor dengan id {$id}");

        return Redirect::route('master.jenis-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Vendor dengan Nama {$stmtJenisVendor->nama} berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function aktif($id)
    {
        $this->authorize('master_jenis_vendor_edit');
        $id = dekrip($id);
        $stmtJenisVendor = JenisVendor::find($id);
        $stmtJenisVendor->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Jenis Vendor dengan Id {$id}");

        return Redirect::route('master.jenis-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Vendor dengan Nama {$stmtJenisVendor->nama} berhasil diaktifkan kembali");
    }

    public function nonaktif($id)
    {
        $this->authorize('master_jenis_vendor_edit');
        $id = dekrip($id);
        $stmtJenisVendor = JenisVendor::find($id);
        $stmtJenisVendor->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Jenis Vendor dengan Id {$id}");

        return Redirect::route('master.jenis-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Vendor dengan Nama {$stmtJenisVendor->nama} berhasil dinonaktifkan");
    }
}
