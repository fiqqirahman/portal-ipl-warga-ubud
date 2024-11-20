<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorPerusahaanDataTable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class RegistrasiVendorPerusahaanController extends Controller
{
    private static string $title = 'Registrasi Vendor Perusahaan';

    static function breadcrumb()
    {
        return [
            self::$title, route('menu.registrasi-vendor-perusahaan.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(VendorPerusahaanDataTable $dataTable)
    {
        $this->authorize('registrasi_vendor_access');
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('menu.vendor-perorangan.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
