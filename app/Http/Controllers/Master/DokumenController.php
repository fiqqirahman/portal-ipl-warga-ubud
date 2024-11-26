<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\DokumenDataTable;
use App\Enums\PermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\DokumenRequest;
use App\Models\Master\Dokumen;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    private static string $title = 'Dokumen Upload';

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
        $this->authorize(PermissionEnum::MasterDokumenAccess->value);
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
        $this->authorize(PermissionEnum::MasterDokumenCreate->value);
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            ['Tambah', route('master.dokumen.create')],
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
			
            Dokumen::create([
                'nama_dokumen' => trim($request->input('nama_dokumen')),
                'keterangan' => trim($request->input('keterangan')),
                'is_required' => (int) $request->input('is_required'),
                'max_file_size' => trim($request->input('max_file_size')),
                'allowed_file_types' => json_encode($request->allowed_file_types),
				'for' => $request->for,
                'created_by' => Auth::id(),
            ]);
			
            createLogActivity('Membuat Master Data Dokumen');

            sweetAlert('success', 'Master Data Dokumen Berhasil di Simpan');
			
            return to_route('master.dokumen.index');
        } catch (\Exception $e) {
            sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
			
            return to_route('master.dokumen.create')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
	    $this->authorize(PermissionEnum::MasterDokumenEdit->value);
	    $title = 'Edit ' . self::$title;
		
	    $breadcrumbs = [
		    HomeController::breadcrumb(),
		    self::breadcrumb(),
		    ['Edit', route('master.dokumen.edit', ['dokumen' => enkrip($dokumen->id)])],
	    ];
		
	    return view('master.dokumen.edit', compact('title', 'breadcrumbs', 'dokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DokumenRequest $request, Dokumen $dokumen)
    {
	    try {
		    $this->authorize(PermissionEnum::MasterDokumenEdit->value);
		    
		    $dokumen->update([
			    'nama_dokumen' => trim($request->input('nama_dokumen')),
			    'keterangan' => trim($request->input('keterangan')),
			    'is_required' => (int) $request->input('is_required'),
			    'max_file_size' => trim($request->input('max_file_size')),
			    'allowed_file_types' => json_encode($request->allowed_file_types),
			    'for' => $request->for,
			    'updated_by' => Auth::id(),
		    ]);
		    
		    createLogActivity('Mengupdate Master Data Dokumen');
		    
		    sweetAlert('success', 'Master Data Dokumen Berhasil di Update');
		    
		    return to_route('master.dokumen.index');
	    } catch (\Exception $e) {
		    sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
		    
		    return to_route('master.dokumen.edit', ['dokumen' => enkrip($dokumen->id)])->withInput();
	    }
    }
	
	public function nonaktif(Dokumen $dokumen)
	{
		try {
			$dokumen->status_data = false;
			$dokumen->save();
			
			createLogActivity('Aktifkan Master Data Dokumen');
			
			sweetAlert('success', 'Master Data Dokumen Berhasil di Nonaktifkan');
			
			return to_route('master.dokumen.index');
		} catch (\Exception $e) {
			sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
			
			return to_route('master.dokumen.index');
		}
	}
	
	public function aktif(Dokumen $dokumen)
	{
		try {
			$dokumen->status_data = true;
			$dokumen->save();
			
			createLogActivity('Aktifkan Master Data Dokumen');
			
			sweetAlert('success', 'Master Data Dokumen Berhasil di Aktifkan');
			
			return to_route('master.dokumen.index');
		} catch (\Exception $e) {
			sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
			
			return to_route('master.dokumen.index');
		}
	}
}
