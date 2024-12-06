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
                    Menu::$MASTER_BANK,
                    Menu::$MASTER_SUB_BIDANG_USAHA,
                    Menu::$MASTER_KUALIFIKASI_GRADE,
                    Menu::$MASTER_JENIS_IDENTITAS,
                    Menu::$MASTER_JABATAN_VENDOR,
                    Menu::$MASTER_JENIS_INVENTARIS,
                    Menu::$MASTER_JENIS_MERK_INVENTARIS,

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
                    Menu::$MASTER_BANK,
                    Menu::$MASTER_SUB_BIDANG_USAHA,
                    Menu::$MASTER_KUALIFIKASI_GRADE,
                    Menu::$MASTER_JENIS_IDENTITAS,
                    Menu::$MASTER_JABATAN_VENDOR,
                    Menu::$MASTER_JENIS_INVENTARIS,
                    Menu::$MASTER_JENIS_MERK_INVENTARIS,

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

                    PermissionEnum::MasterBankAccess->value,
                    PermissionEnum::MasterBankCreate->value,
                    PermissionEnum::MasterBankEdit->value,

                    PermissionEnum::MasterSubBidangUsahaAccess->value,
                    PermissionEnum::MasterSubBidangUsahaCreate->value,
                    PermissionEnum::MasterSubBidangUsahaEdit->value,

                    PermissionEnum::MasterKualifikasiGradeAccess->value,
                    PermissionEnum::MasterKualifikasiGradeCreate->value,
                    PermissionEnum::MasterKualifikasiGradeEdit->value,

                    PermissionEnum::MasterJenisIdentitasAccess->value,
                    PermissionEnum::MasterJenisIdentitasCreate->value,
                    PermissionEnum::MasterJenisIdentitasEdit->value,

                    PermissionEnum::MasterJabatanVendorAccess->value,
                    PermissionEnum::MasterJabatanVendorCreate->value,
                    PermissionEnum::MasterJabatanVendorEdit->value,

                    PermissionEnum::MasterJenisInventarisAccess->value,
                    PermissionEnum::MasterJenisInventarisCreate->value,
                    PermissionEnum::MasterJenisInventarisEdit->value,

                    PermissionEnum::MasterJenisMerkInventarisAccess->value,
                    PermissionEnum::MasterJenisMerkInventarisCreate->value,
                    PermissionEnum::MasterJenisMerkInventarisEdit->value,

                    PermissionEnum::MasterStatusPerusahaanAccess->value,
                    PermissionEnum::MasterStatusPerusahaanEdit->value,
                    PermissionEnum::MasterStatusPerusahaanCreate->value,

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
                    Menu::$MASTER_DOKUMEN,
                    Menu::$MASTER_BANK,
                    Menu::$MASTER_SUB_BIDANG_USAHA,
                    Menu::$MASTER_KUALIFIKASI_GRADE,
                    Menu::$MASTER_JENIS_IDENTITAS,
                    Menu::$MASTER_JABATAN_VENDOR,
                    Menu::$MASTER_JENIS_INVENTARIS,
                    Menu::$MASTER_JENIS_MERK_INVENTARIS,

                    Menu::$REGISTRASI_VENDOR,
                    Menu::$APPROVAL_REGISTRASI_VENDOR,
	            ],
	         ]
        ];
    }
}
