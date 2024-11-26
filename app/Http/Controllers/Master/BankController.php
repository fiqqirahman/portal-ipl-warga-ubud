<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\BankDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\BankRequest;
use App\Models\Master\Bank;
use App\Models\Master\BentukBadanUsaha;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BankController extends Controller
{
    private static string $title = 'Bank';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.bank.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(BankDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterBankAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.bank.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::MasterBankAccess->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.bank.create')],
        ];

        return view('master.bank.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(BankRequest $request): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterBankCreate->value);
        Bank::create($request->validated() + ['created_by' => Auth::id()]);
        createLogActivity('Membuat Master Bank');

        return Redirect::route('master.bank.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Bank berhasil dibuat");
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
        $this->authorize(PermissionEnum::MasterBankEdit->value);
        $title = 'Ubah Data ' . self::$title;
        $id = dekrip($id);
        $stmtBank = Bank::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.bank.edit', enkrip($id))],
        ];


        return view('master.bank.edit', compact('title', 'breadcrumbs', 'stmtBank'));
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(BankRequest $request, string $id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterBankEdit->value);
        $id = dekrip($id);
        $stmtBank = Bank::find($id);
        $stmtBank->update($request->validated() + ['updated_by' => Auth::id()]);

        createLogActivity("Memperbarui Master Bank dengan id {$id}");

        return Redirect::route('master.bank.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Bank dengan Nama {$stmtBank->nama} berhasil diperbarui");
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
        $this->authorize(PermissionEnum::MasterBankEdit->value);
        $id = dekrip($id);
        $stmtBank = Bank::find($id);
        $stmtBank->update(['status_data' => 1, 'updated_by' => Auth::id()]);

        createLogActivity("Mengaktifkan kembali master data Bank dengan Id {$id}");

        return Redirect::route('master.bank.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Bank dengan Nama {$stmtBank->nama} berhasil diaktifkan kembali");
    }

    /**
     * @throws AuthorizationException
     */
    public function nonaktif($id): RedirectResponse
    {
        $this->authorize(PermissionEnum::MasterBankEdit->value);
        $id = dekrip($id);
        $stmtBank = Bank::find($id);
        $stmtBank->update(['status_data' => 2, 'updated_by' => Auth::id()]);

        createLogActivity("Menonaktifkan master data Bank dengan Id {$id}");

        return Redirect::route('master.bank.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Master Data Bank dengan Nama {$stmtBank->nama} berhasil dinonaktifkan");
    }
}
