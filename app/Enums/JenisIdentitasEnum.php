<?php

namespace App\Enums;

enum JenisIdentitasEnum: string {
    case Ktp = 'KTP';
    case Npwp = 'NPWP';
    case Passport = 'Passport';


    public function label(): string
    {
        return match($this) {
            self::Ktp => 'KTP',
            self::Npwp => 'NPWP',
            self::Passport => 'Passport',

        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::Ktp => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Ktp->label() .'</span>',
            self::Npwp => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Npwp->label() .'</span>',
            self::Passport => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Passport->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
