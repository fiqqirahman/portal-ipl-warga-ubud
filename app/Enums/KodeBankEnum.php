<?php

namespace App\Enums;

enum KodeBankEnum: string {
    case BCA = 'Bank BCA';
    case Mandiri = 'Bank Mandiri';

    case DKI = 'Bank DKI';
    case BNI = 'Bank BNI';
    case BSI = 'Bank BSI';
    case BTN = 'Bank BTN';


    public function label(): string
    {
        return match($this) {
            self::BCA => 'Bank BCA',
            self::Mandiri => 'Bank Mandiri',
            self::DKI => 'Bank DKI',
            self::BNI => 'Bank BNI',
            self::BSI => 'Bank BSI',
            self::BTN => 'Bank BTN',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::BCA => '<span class="badge badge-outline badge-primary '. $class .'">'. self::BCA->label() .'</span>',
            self::Mandiri => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Mandiri->label() .'</span>',
            self::DKI => '<span class="badge badge-outline badge-primary '. $class .'">'. self::DKI->label() .'</span>',
            self::BNI => '<span class="badge badge-outline badge-primary '. $class .'">'. self::BNI->label() .'</span>',
            self::BSI => '<span class="badge badge-outline badge-primary '. $class .'">'. self::BSI->label() .'</span>',
            self::BTN => '<span class="badge badge-outline badge-primary '. $class .'">'. self::BTN->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
