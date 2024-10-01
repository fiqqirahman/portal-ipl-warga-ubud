<?php

namespace App\Statics\User;

use App\Enums\PermissionEnum;

class Role
{
    static int $SUPER_ADMIN = 1;
    static int $DEVELOPER = 2;
    static int $VENDOR = 3;
    static int $OP_VENDOR_MANAJEMEN = 4;

    static function getAll(): array
    {
        return [
            self::$SUPER_ADMIN,
            self::$DEVELOPER,
            self::$VENDOR,
            self::$OP_VENDOR_MANAJEMEN,
        ];
    }

    static function getAllForCreate(): array
    {
        return [
            [
                'id' => self::$SUPER_ADMIN,
                'name' => 'Super Admin',
                'permissions' => [
	                // Permission::SomeMenuAccess->value
	                
	                PermissionEnum::UtilityAccess->value,
	                PermissionEnum::DebugEagleEyeAccess->value,
	                PermissionEnum::MasterConfigAccess->value,
                    PermissionEnum::MasterJenisVendorAccess->value,
                    PermissionEnum::MasterJenisVendorEdit->value,
                    PermissionEnum::MasterJenisVendorCreate->value,
                    PermissionEnum::MasterBentukBadanUsahaAccess->value,
                    PermissionEnum::MasterBentukBadanUsahaCreate->value,
                    PermissionEnum::MasterBentukBadanUsahaEdit->value,
                    PermissionEnum::MasterStatusPerusahaanAccess->value,
                    PermissionEnum::MasterStatusPerusahaanCreate->value,
                    PermissionEnum::MasterStatusPerusahaanEdit->value,
                    PermissionEnum::MasterKategoriVendorAccess->value,
                    PermissionEnum::MasterKategoriVendorCreate->value,
                    PermissionEnum::MasterKategoriVendorEdit->value,
                ],
                'menus' => [
                    Menu::$DASHBOARD,

                    Menu::$MASTER_DATA,
                    Menu::$MASTER_JENIS_VENDOR,
                    Menu::$MASTER_BENTUK_BADAN_USAHA,
                    Menu::$MASTER_STATUS_PERUSAHAAN,
                    Menu::$MASTER_KATEGORI_VENDOR,

	                Menu::$UTILITY,
	                Menu::$DEBUG_EAGLE_EYE,
	                Menu::$MASTER_CONFIG,
                ],
            ],
            [
                'id' => self::$DEVELOPER,
                'name' => 'Developer',
                'permissions' => [
	                // Permission::SomeMenuAccess->value
	                
	                PermissionEnum::UtilityAccess->value,
	                PermissionEnum::DebugEagleEyeAccess->value,
	                PermissionEnum::MasterConfigAccess->value,
                    PermissionEnum::MasterJenisVendorAccess->value,
                    PermissionEnum::MasterJenisVendorEdit->value,
                    PermissionEnum::MasterJenisVendorCreate->value,
                    PermissionEnum::MasterBentukBadanUsahaAccess->value,
                    PermissionEnum::MasterBentukBadanUsahaCreate->value,
                    PermissionEnum::MasterBentukBadanUsahaEdit->value,
                    PermissionEnum::MasterStatusPerusahaanAccess->value,
                    PermissionEnum::MasterStatusPerusahaanCreate->value,
                    PermissionEnum::MasterStatusPerusahaanEdit->value,
                    PermissionEnum::MasterKategoriVendorAccess->value,
                    PermissionEnum::MasterKategoriVendorCreate->value,
                    PermissionEnum::MasterKategoriVendorEdit->value,
                ],
                'menus' => [
	                Menu::$DASHBOARD,

                    Menu::$MASTER_DATA,
                    Menu::$MASTER_JENIS_VENDOR,
                    Menu::$MASTER_BENTUK_BADAN_USAHA,
                    Menu::$MASTER_STATUS_PERUSAHAAN,
                    Menu::$MASTER_KATEGORI_VENDOR,

	                Menu::$UTILITY,
	                Menu::$DEBUG_EAGLE_EYE,
	                Menu::$MASTER_CONFIG,
                ],
            ],
	         [
		         'id' => self::$OP_VENDOR_MANAJEMEN,
		         'name' => 'Operator Vendor Manajemen',
		         'permissions' => [
                     PermissionEnum::MasterJenisVendorAccess->value,
                     PermissionEnum::MasterJenisVendorEdit->value,
                     PermissionEnum::MasterJenisVendorCreate->value,
                     PermissionEnum::MasterBentukBadanUsahaAccess->value,
                     PermissionEnum::MasterBentukBadanUsahaCreate->value,
                     PermissionEnum::MasterBentukBadanUsahaEdit->value,
                     PermissionEnum::MasterStatusPerusahaanAccess->value,
                     PermissionEnum::MasterStatusPerusahaanCreate->value,
                     PermissionEnum::MasterStatusPerusahaanEdit->value,
                     PermissionEnum::MasterKategoriVendorAccess->value,
                     PermissionEnum::MasterKategoriVendorCreate->value,
                     PermissionEnum::MasterKategoriVendorEdit->value,
                     ],
		         'menus' => [
                     Menu::$DASHBOARD,

                     Menu::$MASTER_DATA,
                     Menu::$MASTER_JENIS_VENDOR,
                     Menu::$MASTER_BENTUK_BADAN_USAHA,
                     Menu::$MASTER_STATUS_PERUSAHAAN,
                     Menu::$MASTER_KATEGORI_VENDOR,
		         ],
	         ]
        ];
    }
}
