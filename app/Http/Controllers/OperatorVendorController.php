<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorApprovalDataTable;
use App\Enums\DocumentForEnum;
use App\Enums\KondisiInventarisEnum;
use App\Enums\StatusAuditEnum;
use App\Enums\StatusRegistrasiEnum;
use App\Enums\UserVendorTypeEnum;
use App\Http\Requests\RegistrasiVendor\Operator\ApprovalRequest;
use App\Models\KabKota;
use App\Models\Master\Bank;
use App\Models\Master\BentukBadanUsaha;
use App\Models\Master\JabatanVendor;
use App\Models\Master\JenisIdentitas;
use App\Models\Master\JenisInventaris;
use App\Models\Master\JenisMerkInventaris;
use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
use App\Models\Master\KualifikasiGrade;
use App\Models\Master\Negara;
use App\Models\Master\StatusPerusahaan;
use App\Models\Master\SubBidangUsaha;
use App\Models\Provinsi;
use App\Models\RegistrasiVendor;
use App\Services\DocumentService;

class OperatorVendorController extends Controller
{
    private static string $title = 'Approval Registrasi Vendor';

    static function breadcrumb()
    {
        return [
            self::$title, route('menu.operator.registrasi-vendor.index')
        ];
    }
	
	public function index(VendorApprovalDataTable $dataTable)
	{
		$title = 'Data ' . self::$title;
		
		$breadcrumbs = [
			HomeController::breadcrumb(),
			self::breadcrumb(),
		];
		
		return $dataTable->render('menu.operator.approval.index', compact('title', 'breadcrumbs'));
	}
	
    public function show(RegistrasiVendor $registrasiVendor)
    {
		if($registrasiVendor->status_registrasi == StatusRegistrasiEnum::Draft){
			abort(403, 'Registrasi Vendor is Draft');
		}
		
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
	        ['Detail', route('menu.operator.registrasi-vendor.show', ['registrasi_vendor' => enkrip($registrasiVendor->id)])],
        ];
		
	    $data = [
		    'title' => $title,
		    'breadcrumbs' => $breadcrumbs,
		    'stmtKategoriVendor' => KategoriVendor::isActive()->orderBy('nama')->get(),
		    'stmtProvinsi' => Provinsi::isActive()->orderBy('nama')->get(),
		    'stmtNegara' => Negara::isActive()->orderBy('nama')->get(),
		    'stmtBank' => Bank::isActive()->orderBy('nama')->get(),
		    'stmtJenisVendor' => JenisVendor::isActive()->orderBy('nama')->get(),
		    'stmtBentukBadanUsaha' => BentukBadanUsaha::isActive()->orderBy('nama')->get(),
		    'stmtStatusPerusahaan' => StatusPerusahaan::isActive()->orderBy('nama')->get(),
		    'stmtSubBidangUsaha' => SubBidangUsaha::isActive()->orderBy('nama')->get(),
		    'stmtKualifikasiGrade' => KualifikasiGrade::isActive()->orderBy('nama')->get(),
		    'registrasiVendor' => $registrasiVendor,
		    'vendorJenisIdentitas' => JenisIdentitas::isActive()->select(['kode', 'nama'])->get(),
		    'vendorJabatan' => JabatanVendor::isActive()->select(['kode', 'nama'])->get(),
		    'masterJenisInventaris' => JenisInventaris::isActive()->select(['kode', 'nama'])->get(),
		    'masterJenisMerkInventaris' => JenisMerkInventaris::isActive()->select(['kode', 'nama'])->get(),
		    'masterKondisiInventaris' => KondisiInventarisEnum::getAll(),
		    'masterStatusAudit' => StatusAuditEnum::getAll(),
		    'masterKabKota' => KabKota::isActive()->select(['kode', 'nama'])->get(),
		    'availableStatus' => [
				StatusRegistrasiEnum::VerificationDocuments,
				StatusRegistrasiEnum::RevisionDocuments,
				StatusRegistrasiEnum::Approved,
				StatusRegistrasiEnum::Rejected,
		    ]
	    ];
		
		if($registrasiVendor->createdBy->vendor_type === UserVendorTypeEnum::Individual) {
			$data['documentsField'] = DocumentService::makeFields(DocumentForEnum::Individual, $registrasiVendor);
			
			return view('menu.vendor-perorangan.show', $data);
		} else {
			$data['documentsField'] = DocumentService::makeFields(DocumentForEnum::Company, $registrasiVendor);
			
			return view('menu.vendor-perusahaan.show', $data);
		}
    }
	
	public function submit(ApprovalRequest $request, RegistrasiVendor $registrasiVendor)
	{
		try {
			if(!allowUpdateStatusRegistrasi($registrasiVendor)){
				abort(403, 'Not Allowed update status registrasi vendor');
			}
			
			$registrasiVendor->status_registrasi = $request->status_registrasi;
			$registrasiVendor->status_registrasi_notes = trim($request->status_registrasi_notes);
			$registrasiVendor->appointment_date = $request->status_registrasi == StatusRegistrasiEnum::VerificationDocuments->value ?
				$request->appointment_date : null;
			
			$registrasiVendor->save();

			sweetAlert('success', 'Berhasil update status registrasi!');
			
			return to_route('menu.operator.registrasi-vendor.show', ['registrasi_vendor' => enkrip($registrasiVendor->id)]);
		} catch (\Throwable $th) {
			sweetAlertException('Gagal update status registrasi vendor!', $th);
			
			return to_route('menu.operator.registrasi-vendor.show', ['registrasi_vendor' => enkrip($registrasiVendor->id)]);
		}
	}
}
