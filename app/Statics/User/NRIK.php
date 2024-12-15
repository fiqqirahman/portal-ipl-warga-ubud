<?php

namespace App\Statics\User;

use Illuminate\Support\Facades\App;

class NRIK
{
    static string $SUPER_ADMIN = '00000000';
    static string $DEVELOPER = '99999999';
    static string $ADI = '99999998';
    static string $RENDY = '26011214';
    static string $KUSDHIAN = '28451215';
    static string $FIQQI = '42101120';
    static string $KAUTSAR = '46050522';
    static string $WILDAN = '47071022';

    static function getAllForCreate(): array
    {
        $user = [
            ['nrik' => self::$SUPER_ADMIN, 'roles' => [Role::$SUPER_ADMIN]],
        ];

        if (App::environment(['local', 'development'])) {
            $userDev = [
                ['nrik' => self::$DEVELOPER, 'roles' => [Role::$DEVELOPER, Role::$SUPER_ADMIN]],
                ['nrik' => self::$ADI, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$RENDY, 'roles' => [Role::$WARGA]],
                ['nrik' => self::$KUSDHIAN, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$FIQQI, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$KAUTSAR, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$WILDAN, 'roles' => [Role::$DEVELOPER]],
            ];

            $user = [
	            ...$user,
	            ...$userDev
			];
        }

        return $user;
    }
}
