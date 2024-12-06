<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\JenisIdentitasDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\JenisIdentitasRequest;
use App\Models\Master\JenisIdentitas;
use App\Models\Master\KualifikasiGrade;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JenisIdentitasController extends Controller
{
    private static string $title = 'Jenis Identitas';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.jenis-identitas.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(JenisIdentitasDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterJenisIdentitasAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.jenis-identitas.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterJenisIdentitasCreate->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-identitas.create')],
        ];

        return view('master.jenis-identitas.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(JenisIdentitasRequest $request): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisIdentitasCreate->value);
        JenisIdentitas::create($request->validated() + ['created_by' => Auth::id()]);
        createLogActivity('Membuat Master Jenis Identitas');

        return Redirect::route('master.jenis-identitas.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Identitas berhasil dibuat");
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
        $this->authorize(PermissionEnum::MasterJenisIdentitasEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtJenisIdentitas = JenisIdentitas::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-identitas.edit', enkrip($id))],
        ];

        return view('master.jenis-identitas.edit', compact('title', 'breadcrumbs', 'stmtJenisIdentitas'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(JenisIdentitasRequest $request, string $id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisIdentitasEdit->value);
        $id = dekrip($id);
        $stmtJenisIdentitas = JenisIdentitas::find($id);
        $stmtJenisIdentitas->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Jenis Identitas dengan id {$id}");

        return Redirect::route('master.jenis-identitas.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Jenis Identitas dengan Nama {$stmtJenisIdentitas->nama} berhasil diperbarui");
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
        $this->authorize(PermissionEnum::MasterJenisIdentitasEdit->value);
        $id = dekrip($id);
        $stmtJenisIdentitas = JenisIdentitas::find($id);
        $stmtJenisIdentitas->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Jenis Identitas dengan Id {$id}");

        return Redirect::route('master.jenis-identitas.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Identitas dengan Nama {$stmtJenisIdentitas->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisIdentitasEdit->value);
        $id = dekrip($id);
        $stmtJenisIdentitas = JenisIdentitas::find($id);
        $stmtJenisIdentitas->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Jenis Identitas dengan Id {$id}");

        return Redirect::route('master.jenis-identitas.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Identitas dengan Nama {$stmtJenisIdentitas->nama} berhasil dinonaktifkan");
    }
}
