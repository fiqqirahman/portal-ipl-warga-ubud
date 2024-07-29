<?php

namespace App\Statics\User;

use App\Enums\PermissionEnum;

class Role
{
    static int $SUPER_ADMIN = 1;
    static int $DEVELOPER = 2;

    static function getAll(): array
    {
        return [
            self::$SUPER_ADMIN,
            self::$DEVELOPER,
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
	                PermissionEnum::MasterConfigAccess->value
                ],
                'menus' => [
                    Menu::$DASHBOARD,
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
	                PermissionEnum::MasterConfigAccess->value
                ],
                'menus' => [
	                Menu::$DASHBOARD,
	                Menu::$UTILITY,
	                Menu::$DEBUG_EAGLE_EYE,
	                Menu::$MASTER_CONFIG,
                ],
            ],
	        // [
		    //     'id' => self::$EXAMPLE_ROLE,
		    //     'name' => 'Example Role Name',
		    //     'permissions' => [
			//         PermissionEnum::SomeMenuAccess->value,
		    //     ],
		    //     'menus' => [
			//         Menu::$EXAMPLE_MENU
		    //     ],
	        // ]
        ];
    }
}
