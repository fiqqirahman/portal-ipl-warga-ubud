<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranIPLDataTable;
use App\Enums\DocumentForEnum;
use App\Enums\PermissionEnum;
use App\Models\KabKota;
use App\Models\Master\Bank;
use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
use App\Models\Master\KualifikasiGrade;
use App\Models\Master\Negara;
use App\Models\Master\SubBidangUsaha;
use App\Models\Provinsi;
use App\Services\DocumentService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class IplPaymentController extends Controller
{
    private static string $title = 'Pembayaran IPL';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('menu.pembayaran-ipl.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(PembayaranIPLDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::PembayaranIPLAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('menu.pembayaran-ipl.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize(PermissionEnum::PembayaranIPLCreate->value);

        $title = self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            ['Create', route('menu.pembayaran-ipl.create')],
        ];

        $data = [
            'title' => $title,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('menu.pembayaran-ipl.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
