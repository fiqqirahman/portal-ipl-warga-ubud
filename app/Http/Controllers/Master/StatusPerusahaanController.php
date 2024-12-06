<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\StatusPerusahaanDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\StatusPerusahaanRequest;
use App\Models\Master\JenisVendor;
use App\Models\Master\StatusPerusahaan;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StatusPerusahaanController extends Controller
{
    private static $title = 'Status Perusahaan';

    static function breadcrumb()
    {
        return [
            self::$title, route('master.status-perusahaan.index')
        ];
    }

    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(StatusPerusahaanDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterStatusPerusahaanAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.status-perusahaan.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize(PermissionEnum::MasterStatusPerusahaanAccess->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.status-perusahaan.create')],
        ];

        return view('master.status-perusahaan.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(StatusPerusahaanRequest $request)
    {
        $this->authorize(PermissionEnum::MasterStatusPerusahaanCreate->value);
        StatusPerusahaan::create($request->validated() + ['created_by' => Auth::id()]);

        createLogActivity('Membuat Master Data Status Perusahaan');

        return Redirect::route('master.status-perusahaan.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Status Perusahaan berhasil dibuat");
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
        $this->authorize(PermissionEnum::MasterStatusPerusahaanEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtStatusPerusahaan = StatusPerusahaan::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.status-perusahaan.edit', enkrip($id))],
        ];


        return view('master.status-perusahaan.edit', compact('title', 'breadcrumbs', 'stmtStatusPerusahaan'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(StatusPerusahaanRequest $request, string $id)
    {
        $this->authorize(PermissionEnum::MasterStatusPerusahaanEdit->value);
        $id = dekrip($id);
        $stmtStatusPerusahaan = StatusPerusahaan::find($id);
        $stmtStatusPerusahaan->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Data Status Perusahaan dengan id {$id}");

        return Redirect::route('master.status-perusahaan.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Status Perusahaan dengan Nama {$stmtStatusPerusahaan->nama} berhasil diperbarui");
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
        $this->authorize(PermissionEnum::MasterStatusPerusahaanEdit->value);
        $id = dekrip($id);
        $stmtStatusPerusahaan = StatusPerusahaan::find($id);
        $stmtStatusPerusahaan->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Status Perusahaan dengan Id {$id}");

        return Redirect::route('master.status-perusahaan.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Status Perusahaan dengan Nama {$stmtStatusPerusahaan->nama} berhasil diaktifkan kembali");
    }

    public function nonaktif($id)
    {
        $this->authorize(PermissionEnum::MasterStatusPerusahaanEdit->value);
        $id = dekrip($id);
        $stmtStatusPerusahaan = StatusPerusahaan::find($id);
        $stmtStatusPerusahaan->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Status Perusahaan dengan Id {$id}");

        return Redirect::route('master.status-perusahaan.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Status Perusahaan dengan Nama {$stmtStatusPerusahaan->nama} berhasil dinonaktifkan");
    }
}
