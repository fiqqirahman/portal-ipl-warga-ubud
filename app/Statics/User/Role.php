<?php

namespace App\Statics\User;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;

class Role
{
    static int $SUPER_ADMIN = 1;
    static int $DEVELOPER = 2;
    static int $WARGA = 3;
    static int $BENDAHARA = 4;
    static int $KETUA_RT = 5;

    public static function getAllForCreate(): array
    {
        return [
            [
                'id' => self::$SUPER_ADMIN,
                'name' => RoleEnum::SuperAdmin,
	            'permissions' => PermissionEnum::getAll(),
                'menus' => [
                    Menu::$DASHBOARD,
                    Menu::$MENU_IPL,
                    Menu::$PEMBAYARAN_IPL,
                    Menu::$APPROVAL_PEMBAYARAN_IPL,


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

                    Menu::$MENU_IPL,
                    Menu::$PEMBAYARAN_IPL,
                    Menu::$APPROVAL_PEMBAYARAN_IPL,

	                Menu::$UTILITY,
	                Menu::$DEBUG_EAGLE_EYE,
	                Menu::$MASTER_CONFIG,
                ],
            ],
	        [
		        'id' => self::$WARGA,
		        'name' => RoleEnum::Warga,
		        'permissions' => [
			        PermissionEnum::PembayaranIPLAccess->value,
			        PermissionEnum::PembayaranIPLCreate->value,
			        PermissionEnum::PembayaranIPLEdit->value,
		        ],
		        'menus' => [
			        Menu::$DASHBOARD,

			        Menu::$MENU_IPL,
			        Menu::$PEMBAYARAN_IPL,
		        ],
	        ],
            [
                'id' => self::$BENDAHARA,
                'name' => RoleEnum::Bendahara,
                'permissions' => [
                    PermissionEnum::PembayaranIPLAccess->value,
                    PermissionEnum::PembayaranIPLCreate->value,
                    PermissionEnum::PembayaranIPLEdit->value,
                ],
                'menus' => [
                    Menu::$DASHBOARD,

                    Menu::$MENU_IPL,
                    Menu::$PEMBAYARAN_IPL,
                    Menu::$APPROVAL_PEMBAYARAN_IPL,
                ],
            ],
            [
                'id' => self::$KETUA_RT,
                'name' => RoleEnum::KetuaRT,
                'permissions' => [
                    PermissionEnum::PembayaranIPLAccess->value,
                    PermissionEnum::PembayaranIPLCreate->value,
                    PermissionEnum::PembayaranIPLEdit->value,
                ],
                'menus' => [
                    Menu::$DASHBOARD,

                    Menu::$MENU_IPL,
                    Menu::$PEMBAYARAN_IPL,
                    Menu::$APPROVAL_PEMBAYARAN_IPL,
                ],
            ],
        ];
    }
}
