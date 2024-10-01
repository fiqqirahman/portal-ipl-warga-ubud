<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\BentukBadanUsahaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\BentukBadanUsahaRequest;
use App\Models\Master\BentukBadanUsaha;
use App\Models\Master\JenisVendor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BentukBadanUsahaController extends Controller
{
    private static $title = 'Bentuk Badan Usaha';

    static function breadcrumb()
    {
        return [
            self::$title, route('master.bentuk-badan-usaha.index')
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(BentukBadanUsahaDataTable $dataTable)
    {
        $this->authorize('master_bentuk_badan_usaha_access');
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.bentuk-badan-usaha.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('master_bentuk_badan_usaha_access');
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.bentuk-badan-usaha.create')],
        ];

        return view('master.bentuk-badan-usaha.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(BentukBadanUsahaRequest $request)
    {
        $this->authorize('master_bentuk_badan_usaha_create');
        BentukBadanUsaha::create($request->validated() + ['created_by' => Auth::id()]);
        createLogActivity('Membuat Master Data Bentuk Badan Usaha');

        return Redirect::route('master.bentuk-badan-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Bentuk Badan Usaha berhasil dibuat");
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
        $this->authorize('master_bentuk_badan_usaha_edit');
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtBentukBadanUsaha = BentukBadanUsaha::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.bentuk-badan-usaha.edit', enkrip($id))],
        ];


        return view('master.bentuk-badan-usaha.edit', compact('title', 'breadcrumbs', 'stmtBentukBadanUsaha'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(BentukBadanUsahaRequest $request, string $id)
    {
        $this->authorize('master_bentuk_badan_usaha_edit');
        $id = dekrip($id);
        $stmtBentukBadanUsaha = BentukBadanUsaha::find($id);
        $stmtBentukBadanUsaha->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Data Bentuk Badan Usaha dengan id {$id}");

        return Redirect::route('master.bentuk-badan-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Bentuk Badan Usaha dengan Nama {$stmtBentukBadanUsaha->nama} berhasil diperbarui");
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
        $this->authorize('master_bentuk_badan_usaha_edit');
        $id = dekrip($id);
        $stmtBentukBadanUsaha = BentukBadanUsaha::find($id);
        $stmtBentukBadanUsaha->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Bentuk Badan Usaha dengan Id {$id}");

        return Redirect::route('master.bentuk-badan-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Bentuk Badan Usaha dengan Nama {$stmtBentukBadanUsaha->nama} berhasil diaktifkan kembali");
    }

    public function nonaktif($id)
    {
        $this->authorize('master_bentuk_badan_usaha_edit');
        $id = dekrip($id);
        $stmtBentukBadanUsaha = BentukBadanUsaha::find($id);
        $stmtBentukBadanUsaha->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Bentuk Badan Usaha dengan Id {$id}");

        return Redirect::route('master.bentuk-badan-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Bentuk Badan Usaha dengan Nama {$stmtBentukBadanUsaha->nama} berhasil dinonaktifkan");
    }
}
