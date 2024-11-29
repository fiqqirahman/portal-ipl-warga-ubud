<?php

namespace App\Enums;

enum StatusAuditEnum: string {
    case Audited = 'Audited';
    case NotAudited = 'Not Audited';

    public function label(): string
    {
        return match($this) {
            self::Audited => 'Audited',
            self::NotAudited => 'Not Audited',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::Audited => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Audited->label() .'</span>',
            self::NotAudited => '<span class="badge badge-outline badge-warning '. $class .'">'. self::NotAudited->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
