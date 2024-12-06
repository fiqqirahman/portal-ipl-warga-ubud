<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\JabatanVendorDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\JabatanVendorRequest;
use App\Models\Master\JabatanVendor;
use App\Models\Master\JenisIdentitas;
use App\Models\Master\StatusPerusahaan;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JabatanVendorController extends Controller
{
    private static string $title = 'Jabatan Vendor';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.jabatan-vendor.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(JabatanVendorDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.jabatan-vendor.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorCreate->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jabatan-vendor.create')],
        ];

        return view('master.jabatan-vendor.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(JabatanVendorRequest $request): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorCreate->value);
        JabatanVendor::create($request->validated() + ['created_by' => Auth::id()]);

        createLogActivity('Membuat Master Data Jabatan Vendor');

        return Redirect::route('master.jabatan-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jabatan Vendor berhasil dibuat");
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
    public function edit(string $id): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtJabatanVendor= JabatanVendor::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jabatan-vendor.edit', enkrip($id))],
        ];

        return view('master.jabatan-vendor.edit', compact('title', 'breadcrumbs', 'stmtJabatanVendor'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(JabatanVendorRequest $request, string $id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorEdit->value);
        $id = dekrip($id);
        $stmtJabatanVendor = JabatanVendor::find($id);
        $stmtJabatanVendor->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Jabatan Vendor dengan id {$id}");

        return Redirect::route('master.jabatan-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Jabatan Vendor dengan Nama {$stmtJabatanVendor->nama} berhasil diperbarui");
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
    public function aktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorEdit->value);
        $id = dekrip($id);
        $stmtJabatanVendor = JabatanVendor::find($id);
        $stmtJabatanVendor->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Jabatan Vendor dengan Id {$id}");

        return Redirect::route('master.jabatan-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jabatan Vendor dengan Nama {$stmtJabatanVendor->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorEdit->value);
        $id = dekrip($id);
        $stmtJabatanVendor = JabatanVendor::find($id);
        $stmtJabatanVendor->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Jabatan Vendor dengan Id {$id}");

        return Redirect::route('master.jabatan-vendor.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jabatan Vendor dengan Nama {$stmtJabatanVendor->nama} berhasil dinonaktifkan");
    }
}

