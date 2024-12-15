<?php

namespace App\Enums;

enum JenisPembayaranEnum: string {
    case Tunia = 'Tunai';
    case NonTunai = 'Non Tunai';


    public function label(): string
    {
        return match($this) {
            self::Tunia => 'Tunia',
            self::NonTunai => 'Non Tunai',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::Tunia => '<span class="badge badge-secondary '. $class .'">'. self::Tunia->label() .'</span>',
            self::NonTunai => '<span class="badge badge-outline badge-info '. $class .'">'. self::NonTunai->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'name'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
