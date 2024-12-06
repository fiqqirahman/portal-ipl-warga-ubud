<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\JenisMerkInventarisDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\JenisMerkInventarisRequest;
use App\Models\Master\JenisIdentitas;
use App\Models\Master\JenisInventaris;
use App\Models\Master\JenisMerkInventaris;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JenisMerkInventarisController extends Controller
{
    private static string $title = 'Jenis Merk Inventaris';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.jenis-merk-inventaris.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(JenisMerkInventarisDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterJenisMerkInventarisAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.jenis-merk-inventaris.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterJenisMerkInventarisCreate->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-merk-inventaris.create')],
        ];

        return view('master.jenis-merk-inventaris.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(JenisMerkInventarisRequest $request): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisMerkInventarisCreate->value);
        JenisMerkInventaris::create($request->validated() + ['created_by' => Auth::id()]);
        createLogActivity('Membuat Master Jenis Merk Inventaris');

        return Redirect::route('master.jenis-merk-inventaris.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Merk Inventaris berhasil dibuat");
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
        $this->authorize(PermissionEnum::MasterJenisMerkInventarisEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtJenisMerkInventaris = JenisMerkInventaris::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.jenis-merk-inventaris.edit', enkrip($id))],
        ];

        return view('master.jenis-merk-inventaris.edit', compact('title', 'breadcrumbs', 'stmtJenisMerkInventaris'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisMerkInventarisEdit->value);
        $id = dekrip($id);
        $stmtJenisMerkInventaris = JenisMerkInventaris::find($id);
        $stmtJenisMerkInventaris->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Jenis Merk Inventaris dengan id {$id}");

        return Redirect::route('master.jenis-merk-inventaris.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Jenis Merk Inventaris dengan Nama {$stmtJenisMerkInventaris->nama} berhasil diperbarui");
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
        $this->authorize(PermissionEnum::MasterJenisMerkInventarisEdit->value);
        $id = dekrip($id);
        $stmtJenisMerkInventaris = JenisMerkInventaris::find($id);
        $stmtJenisMerkInventaris->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Jenis Merk Inventaris dengan Id {$id}");

        return Redirect::route('master.jenis-merk-inventaris.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Merk Inventaris dengan Nama {$stmtJenisMerkInventaris->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterJenisMerkInventarisEdit->value);
        $id = dekrip($id);
        $stmtJenisMerkInventaris = JenisMerkInventaris::find($id);
        $stmtJenisMerkInventaris->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Jenis Merk Inventaris dengan Id {$id}");

        return Redirect::route('master.jenis-merk-inventaris.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Jenis Merk Inventaris dengan Nama {$stmtJenisMerkInventaris->nama} berhasil dinonaktifkan");
    }
}
