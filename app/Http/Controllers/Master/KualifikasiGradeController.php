<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\KualifiksiGradeDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\KualifikasiGradeRequest;
use App\Models\Master\Bank;
use App\Models\Master\KualifikasiGrade;
use App\Models\Master\SubBidangUsaha;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class KualifikasiGradeController extends Controller
{
    private static string $title = 'Kualifikasi Grade';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.kualifikasi-grade.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(KualifiksiGradeDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterKualifikasiGradeAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.kualifikasi-grade.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterKualifikasiGradeAccess->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.kualifikasi-grade.create')],
        ];

        return view('master.kualifikasi-grade.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(KualifikasiGradeRequest $request): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterKualifikasiGradeCreate->value);
        KualifikasiGrade::create($request->validated() + ['created_by' => Auth::id()]);
        createLogActivity('Membuat Master Kualifikasi Grade');

        return Redirect::route('master.kualifikasi-grade.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Kualifikasi Grade berhasil dibuat");
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
        $this->authorize(PermissionEnum::MasterKualifikasiGradeEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtKualifikasiGrade = KualifikasiGrade::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.kualifikasi-grade.edit', enkrip($id))],
        ];

        return view('master.kualifikasi-grade.edit', compact('title', 'breadcrumbs', 'stmtKualifikasiGrade'));

    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(KualifikasiGradeRequest $request, string $id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterKualifikasiGradeEdit->value);
        $id = dekrip($id);
        $stmtKualifikasiGrade = KualifikasiGrade::find($id);
        $stmtKualifikasiGrade->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Kualifikasi Grade dengan id {$id}");

        return Redirect::route('master.kualifikasi-grade.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Kualifikasi Grade dengan Nama {$stmtKualifikasiGrade->nama} berhasil diperbarui");
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
        $this->authorize(PermissionEnum::MasterKualifikasiGradeEdit->value);
        $id = dekrip($id);
        $stmtKualifikasiGrade = KualifikasiGrade::find($id);
        $stmtKualifikasiGrade->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Kualifikasi Grade dengan Id {$id}");

        return Redirect::route('master.kualifikasi-grade.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Kualifikasi Grade dengan Nama {$stmtKualifikasiGrade->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterKualifikasiGradeEdit->value);
        $id = dekrip($id);
        $stmtKualifikasiGrade = KualifikasiGrade::find($id);
        $stmtKualifikasiGrade->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Kualifikasi Grade dengan Id {$id}");

        return Redirect::route('master.kualifikasi-grade.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Kualifikasi Grade dengan Nama {$stmtKualifikasiGrade->nama} berhasil dinonaktifkan");
    }
}
