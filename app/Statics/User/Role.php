<?php

namespace App\Statics\User;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;

class Role
{
    static int $SUPER_ADMIN = 1;
    static int $DEVELOPER = 2;
    static int $VENDOR = 3;
    static int $OP_VENDOR_MANAJEMEN = 4;

    public static function getAllForCreate(): array
    {
        return [
            [
                'id' => self::$SUPER_ADMIN,
                'name' => RoleEnum::SuperAdmin,
	            'permissions' => PermissionEnum::getAll(),
                'menus' => [
                    Menu::$DASHBOARD,

                    Menu::$MASTER_DATA,
                    Menu::$MASTER_JENIS_VENDOR,
                    Menu::$MASTER_BENTUK_BADAN_USAHA,
                    Menu::$MASTER_STATUS_PERUSAHAAN,
                    Menu::$MASTER_KATEGORI_VENDOR,
                    Menu::$MASTER_DOKUMEN,

                    Menu::$REGISTRASI_VENDOR,
                    Menu::$VENDOR_PERUSAHAAN,
                    Menu::$VENDOR_PERORANGAN,
                    Menu::$APPROVAL_REGISTRASI_VENDOR,

	                Menu::$UTILITY,
	                Menu::$DEBUG_EAGLE_EYE,
	                Menu::$MASTER_CONFIG,
                ],
            ],
            [
                'id' => self::$DEVELOPER,
                'name' => RoleEnum::Developer,
                'permissions' => PermissionEnum::getAll(),
                'menus' => [
	                Menu::$DASHBOARD,

                    Menu::$MASTER_DATA,
                    Menu::$MASTER_JENIS_VENDOR,
                    Menu::$MASTER_BENTUK_BADAN_USAHA,
                    Menu::$MASTER_STATUS_PERUSAHAAN,
                    Menu::$MASTER_KATEGORI_VENDOR,
                    Menu::$MASTER_DOKUMEN,

                    Menu::$REGISTRASI_VENDOR,
                    Menu::$VENDOR_PERUSAHAAN,
                    Menu::$VENDOR_PERORANGAN,
                    Menu::$APPROVAL_REGISTRASI_VENDOR,

	                Menu::$UTILITY,
	                Menu::$DEBUG_EAGLE_EYE,
	                Menu::$MASTER_CONFIG,
                ],
            ],
	        [
		        'id' => self::$VENDOR,
		        'name' => RoleEnum::Vendor,
		        'permissions' => [
			        PermissionEnum::RegistrasiVendorAccess->value,
			        PermissionEnum::RegistrasiVendorCreate->value,
			        PermissionEnum::RegistrasiVendorEdit->value,
			        PermissionEnum::RegistrasiVendorDetail->value,
		        ],
		        'menus' => [
			        Menu::$DASHBOARD,
			        
			        Menu::$REGISTRASI_VENDOR,
			        Menu::$VENDOR_PERUSAHAAN,
			        Menu::$VENDOR_PERORANGAN,
		        ],
	        ],
            [
	            'id' => self::$OP_VENDOR_MANAJEMEN,
	            'name' => RoleEnum::OperatorVendorManajemen,
	            'permissions' => [
                    PermissionEnum::MasterJenisVendorAccess->value,
                    PermissionEnum::MasterJenisVendorEdit->value,
                    PermissionEnum::MasterJenisVendorCreate->value,
		            
                    PermissionEnum::MasterBentukBadanUsahaAccess->value,
                    PermissionEnum::MasterBentukBadanUsahaCreate->value,
                    PermissionEnum::MasterBentukBadanUsahaEdit->value,
		            
                    PermissionEnum::RegistrasiVendorApproval->value,

                    PermissionEnum::MasterDokumenAccess->value,
                    PermissionEnum::MasterDokumenCreate->value,
                    PermissionEnum::MasterDokumenEdit->value,
                 ],
	            'menus' => [
                    Menu::$DASHBOARD,

                    Menu::$MASTER_DATA,
                    Menu::$MASTER_JENIS_VENDOR,
                    Menu::$MASTER_BENTUK_BADAN_USAHA,
                    Menu::$MASTER_STATUS_PERUSAHAAN,
                    Menu::$MASTER_KATEGORI_VENDOR,
                    Menu::$MASTER_DOKUMEN,

                    Menu::$REGISTRASI_VENDOR,
                    Menu::$APPROVAL_REGISTRASI_VENDOR,
	            ],
	         ]
        ];
    }
}
