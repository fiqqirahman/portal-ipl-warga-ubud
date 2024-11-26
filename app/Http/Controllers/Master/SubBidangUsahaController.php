<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\SubBidangUsahaDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\SubBidangUsahaRequest;
use App\Models\Master\Bank;
use App\Models\Master\SubBidangUsaha;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SubBidangUsahaController extends Controller
{
    private static string $title = 'Sub Bidang Usaha';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.sub-bidang-usaha.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(SubBidangUsahaDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterSubBidangUsahaAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.sub-bidang-usaha.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterSubBidangUsahaAccess->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.sub-bidang-usaha.create')],
        ];

        return view('master.sub-bidang-usaha.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(SubBidangUsahaRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterBankCreate->value);
        SubBidangUsaha::create($request->validated() + ['created_by' => Auth::id()]);
        createLogActivity('Membuat Master Sub Bidang Usaha');

        return Redirect::route('master.sub-bidang-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Sub Bidang Usaha berhasil dibuat");
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
        $this->authorize(PermissionEnum::MasterSubBidangUsahaEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtSubBidangUsaha = SubBidangUsaha::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.sub-bidang-usaha.edit', enkrip($id))],
        ];


        return view('master.sub-bidang-usaha.edit', compact('title', 'breadcrumbs', 'stmtSubBidangUsaha'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(SubBidangUsahaRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterSubBidangUsahaEdit->value);
        $id = dekrip($id);
        $stmtSubBidangUsaha = Bank::find($id);
        $stmtSubBidangUsaha->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Sub Bidang Usaha dengan id {$id}");

        return Redirect::route('master.sub-bidang-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Sub Bidang Usaha dengan Nama {$stmtSubBidangUsaha->nama} berhasil diperbarui");
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
        $this->authorize(PermissionEnum::MasterSubBidangUsahaEdit->value);
        $id = dekrip($id);
        $stmtSubBidangUsaha = SubBidangUsaha::find($id);
        $stmtSubBidangUsaha->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Sub Bidang Usaha dengan Id {$id}");

        return Redirect::route('master.sub-bidang-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Sub Bidang Usaha dengan Nama {$stmtSubBidangUsaha->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterSubBidangUsahaEdit->value);
        $id = dekrip($id);
        $stmtSubBidangUsaha = SubBidangUsaha::find($id);
        $stmtSubBidangUsaha->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Sub Bidang Usaha dengan Id {$id}");

        return Redirect::route('master.sub-bidang-usaha.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Sub Bidang Usaha dengan Nama {$stmtSubBidangUsaha->nama} berhasil dinonaktifkan");
    }
}
