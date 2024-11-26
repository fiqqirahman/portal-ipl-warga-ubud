<?php

namespace App\Enums;

enum KualifikasiGradeEnum: string {
    case TidakDikualifikasikan = 'Tidak Dikualifikasikan';
    case Menengah = 'Menengah';

    public function label(): string
    {
        return match($this) {
            self::TidakDikualifikasikan => 'Tidak Dikualifikasikan',
            self::Menengah => 'Menengah',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::TidakDikualifikasikan => '<span class="badge badge-outline badge-primary '. $class .'">'. self::TidakDikualifikasikan->label() .'</span>',
            self::Menengah => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Menengah->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
