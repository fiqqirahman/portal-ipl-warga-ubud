<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\KategoriVendorDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\KategoriVendorRequest;
use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class KategoriVendorController extends Controller
{
    private static $title = 'Kategori Vendor';

    static function breadcrumb()
    {
        return [
            self::$title, route('master.kategori-vendor.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(KategoriVendorDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterKategoriVendorAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.kategori-vendor.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterKategoriVendorAccess->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.kategori-vendor.create')],
        ];

        return view('master.kategori-vendor.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(KategoriVendorRequest $request)
    {
        $this->authorize(PermissionEnum::MasterKategoriVendorCreate->value);
        KategoriVendor::create($request->validated() + ['created_by' => Auth::id()]);

        createLogActivity('Membuat Master Data Kategori Vendor');

        return Redirect::route('master.kategori-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Kategori Vendor berhasil dibuat");
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
     * @throws AuthorizationException
     */
    public function edit(string $id)
    {
        $this->authorize(PermissionEnum::MasterKategoriVendorEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtKategoriVendor = KategoriVendor::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.kategori-vendor.edit', enkrip($id))],
        ];


        return view('master.kategori-vendor.edit', compact('title', 'breadcrumbs', 'stmtKategoriVendor'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(KategoriVendorRequest $request, string $id)
    {
        $this->authorize(PermissionEnum::MasterKategoriVendorEdit->value);
        $id = dekrip($id);
        $stmtKategoriVendor = KategoriVendor::find($id);
        $stmtKategoriVendor->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Data Kategori Vendor dengan id {$id}");

        return Redirect::route('master.kategori-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Kategori Vendor dengan Nama {$stmtKategoriVendor->nama} berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * @throws AuthorizationException
     */
    public function aktif($id)
    {
        $this->authorize(PermissionEnum::MasterKategoriVendorEdit->value);
        $id = dekrip($id);
        $stmtKategoriVendor = KategoriVendor::find($id);
        $stmtKategoriVendor->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Kategori Vendor dengan Id {$id}");

        return Redirect::route('master.kategori-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Kategori Vendor dengan Nama {$stmtKategoriVendor->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id)
    {
        $this->authorize(PermissionEnum::MasterKategoriVendorEdit->value);
        $id = dekrip($id);
        $stmtKategoriVendor = KategoriVendor::find($id);
        $stmtKategoriVendor->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Kategori Vendor dengan Id {$id}");

        return Redirect::route('master.kategori-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Kategori Vendor dengan Nama {$stmtKategoriVendor->nama} berhasil dinonaktifkan");
    }
}
