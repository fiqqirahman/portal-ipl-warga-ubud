<?php

namespace App\Enums;

enum KondisiInventarisEnum: string {
    case Baik = 'Baik';
    case TidakBaik = 'Tidak baik';

    public function label(): string
    {
        return match($this) {
            self::Baik => 'Baik',
            self::TidakBaik => 'Tidak Baik',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::Baik => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Baik->label() .'</span>',
            self::TidakBaik => '<span class="badge badge-outline badge-warning '. $class .'">'. self::TidakBaik->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
