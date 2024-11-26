<?php

namespace App\Enums;

enum SubBadanUsahaEnum: string {
    case Konsultasi = 'Konsultasi';

    public function label(): string
    {
        return match($this) {
            self::Konsultasi => 'Konsultasi',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::Konsultasi => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Konsultasi->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
