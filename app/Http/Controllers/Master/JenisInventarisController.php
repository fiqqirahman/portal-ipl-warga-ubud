<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\JenisInventarisDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\JenisInventarisRequest;
use App\Models\Master\JenisIdentitas;
use App\Models\Master\JenisInventaris;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JenisInventarisController extends Controller
{
    private static string $title = 'Jenis Inventaris';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.jenis-invetaris.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(JenisInventarisDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterJenisInventarisAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.jenis-invetaris.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterJenisInventarisCreate->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-invetaris.create')],
        ];

        return view('master.jenis-invetaris.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(JenisInventarisRequest $request): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisInventarisCreate->value);
        JenisInventaris::create($request->validated() + ['created_by' => Auth::id()]);
        createLogActivity('Membuat Master Jenis Inventaris');

        return Redirect::route('master.jenis-invetaris.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Inventaris berhasil dibuat");
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
        $this->authorize(PermissionEnum::MasterJenisInventarisEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtJenisInventaris = JenisInventaris::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-invetaris.edit', enkrip($id))],
        ];

        return view('master.jenis-invetaris.edit', compact('title', 'breadcrumbs', 'stmtJenisInventaris'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(JenisInventarisRequest $request, string $id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisInventarisEdit->value);
        $id = dekrip($id);
        $stmtJenisInventaris = JenisInventaris::find($id);
        $stmtJenisInventaris->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Jenis Inventaris dengan id {$id}");

        return Redirect::route('master.jenis-invetaris.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Jenis Inventaris dengan Nama {$stmtJenisInventaris->nama} berhasil diperbarui");
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
        $this->authorize(PermissionEnum::MasterJenisInventarisEdit->value);
        $id = dekrip($id);
        $stmtJenisInventaris = JenisInventaris::find($id);
        $stmtJenisInventaris->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Jenis Identitas dengan Id {$id}");

        return Redirect::route('master.jenis-identitas.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Identitas dengan Nama {$stmtJenisInventaris->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisInventarisEdit->value);
        $id = dekrip($id);
        $stmtJenisInventaris = JenisInventaris::find($id);
        $stmtJenisInventaris->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Jenis Inventaris dengan Id {$id}");

        return Redirect::route('master.jenis-invetaris.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Inventaris dengan Nama {$stmtJenisInventaris->nama} berhasil dinonaktifkan");
    }
}
