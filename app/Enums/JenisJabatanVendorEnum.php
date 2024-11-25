<?php

namespace App\Enums;

enum JenisJabatanVendorEnum: string {
    case KomisarisUtama = 'Komisaris Utama';
    case Komisaris = 'Komisaris';
    case DirekturUtama = 'Direktur Utama';
    case Direktur = 'Direktur';



    public function label(): string
    {
        return match($this) {
            self::KomisarisUtama => 'Komisaris Utama',
            self::Komisaris => 'Komisaris',
            self::DirekturUtama => 'Direktur Utama',
            self::Direktur => 'Direktur',

        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::KomisarisUtama => '<span class="badge badge-outline badge-primary '. $class .'">'. self::KomisarisUtama->label() .'</span>',
            self::Komisaris => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Komisaris->label() .'</span>',
            self::DirekturUtama => '<span class="badge badge-outline badge-primary '. $class .'">'. self::DirekturUtama->label() .'</span>',
            self::Direktur => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Direktur->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
