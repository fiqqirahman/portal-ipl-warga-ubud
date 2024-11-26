<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\JabatanVendorDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class JabatanVendorController extends Controller
{
    private static string $title = 'Jabatan Vendor';

    static function breadcrumb(): array
    {
        return [
            self::$title, route('master.jabatan-vendor.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(JabatanVendorDataTable $dataTable)
    {
        $this->authorize(PermissionEnum::MasterJabatanVendorAccess->value);
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.jabatan-vendor.index', compact('title', 'breadcrumbs'));
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
