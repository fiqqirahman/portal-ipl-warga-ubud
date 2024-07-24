<?php

namespace App\Statics\User;

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
	                // Permission::$SOME_MENU_ACCESS
                ],
                'menus' => [
                    Menu::$DASHBOARD
                ],
            ],
            [
                'id' => self::$DEVELOPER,
                'name' => 'Developer',
                'permissions' => [
	                // Permission::$SOME_MENU_ACCESS
                ],
                'menus' => [
                    Menu::$DASHBOARD
                ],
            ],
	        // [
		    //     'id' => self::$EXAMPLE_ROLE,
		    //     'name' => 'Example Role Name',
		    //     'permissions' => [
			//         // Permission::$SOME_MENU_ACCESS
		    //     ],
		    //     'menus' => [
			//         Menu::$EXAMPLE_MENU
		    //     ],
	        // ]
        ];
    }
}
