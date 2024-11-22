<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\DokumenDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\DokumenRequest;
use App\Models\Master\Dokumen;
use App\Models\Master\JenisVendor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DokumenController extends Controller
{
    private static $title = 'Dokumen Upload';

    static function breadcrumb()
    {
        return [
            self::$title, route('master.dokumen.index')
        ];
    }
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(DokumenDataTable $dataTable)
    {
        $this->authorize('master_dokumen_access');
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('master.dokumen.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize('master_dokumen_access');
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('master.dokumen.create')],
        ];

        return view('master.dokumen.create', compact('title', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(DokumenRequest $request): RedirectResponse
    {
        try {
            $this->authorize(PermissionEnum::MasterDokumenCreate->value);

            $validatedData['allowed_file_types'] = json_encode(['allowed_file_types']);

            $masterDokumen = Dokumen::create($request->safe()->all() + [
                    'nama_dokumen' => $request->input('nama_dokumen'),
                    'keterangan' => $request->input('keterangan'),
                    'is_required' => $request->input('is_required'),
                    'max_file_size' => $request->input('max_file_size'),
                    'allowed_file_types' => $validatedData,
                    'created_by' => Auth::id(),
                ]);
            createLogActivity('Membuat Master Data Dokumen');

            sweetAlert('success', 'Master Data Dokumen Berhasil di Simpan');
            return to_route('master.dokumen.index');
        } catch (\Exception $e) {
            sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.')->withInput();
        }
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
