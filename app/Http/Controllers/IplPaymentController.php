<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranIPLDataTable;
use App\Enums\DocumentForEnum;
use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusPembayaranIPLEnum;
use App\Http\Requests\IplPaymentRequest;
use App\Models\IplPayment;
use App\Models\IplPaymentLog;
use App\Models\KabKota;
use App\Models\Master\Bank;
use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
use App\Models\Master\KualifikasiGrade;
use App\Models\Master\Negara;
use App\Models\Master\SubBidangUsaha;
use App\Models\Provinsi;
use App\Models\User;
use App\Services\DocumentService;
use App\Statics\Master\KodeFile;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(IplPaymentRequest $request)
    {
        try {
            $method = $request->method;
            $periode = $request->periode;
            $user = Auth::user();

            $filePKOriginal = str_replace(' ', '_', $request->proof->getClientOriginalName());
            $filePKPath = $request->file('proof')->storeAs('bukti_pembayaran_ipl/' . str_replace(' ', '_', $user->name), time() . '_' . $filePKOriginal, 'public');
            $filePK = createHistoryFile(KodeFile::$BuktiPembayaran, $filePKPath, 'Bukti Pembayaran IPL');

            $amount = str_replace(['Rp', '.', ' '], '', $request->amount);

            $iplPayment = IplPayment::create($request->safe()->except('proof') + [
                    'amount' => $amount,
                    'method' => $method,
                    'proof' => $filePK->id,
                    'periode' => $periode,
                    'status' => StatusPembayaranIPLEnum::Checked,
                    'created_by' => Auth::id(),
                    'created_at' => Carbon::now(),
                ]);
//            $iplPayment->storeDocuments($request->proof());


            createLogActivity('Membuat Pembayaran IPL Baru');

            IplPaymentLog::create([
                'ipl_payment_id' => $iplPayment->id,
                'log_details' => 'Payment initiated by user.',
            ]);

            sweetAlert('success','Payment created successfully.');
            return to_route('menu.pembayaran-ipl.index');

        } catch (\Exception $e) {
            sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.')->withInput();
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
