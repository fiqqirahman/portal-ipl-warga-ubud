<?php

namespace App\Http\Controllers;

use App\DataTables\Menu\VendorApprovalDataTable;
use App\Models\RegistrasiVendor;

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
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];
    }
	
	public function submit(RegistrasiVendor $registrasiVendor)
	{
		$title = 'Data ' . self::$title;
		
		$breadcrumbs = [
			HomeController::breadcrumb(),
			self::breadcrumb(),
		];
	}
}
