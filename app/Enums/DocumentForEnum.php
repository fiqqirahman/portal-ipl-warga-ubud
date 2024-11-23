<?php

namespace App\Enums;

enum DocumentForEnum: string {
	case Individual = 'individual';
	case Company = 'company';

    public function label(): string
    {
        return match($this) {
            self::Individual => 'Perorangan',
            self::Company => 'Perusahaan',
        };
    }
	
	public function badge(?string $class = null): string
	{
		return match($this) {
			self::Individual => '<span class="badge badge-info '. $class .'">'. self::Individual->label() .'</span>',
			self::Company => '<span class="badge badge-primary '. $class .'">'. self::Company->label() .'</span>',
		};
	}

    public static function getAll(bool $withKey = false, string $keyName = 'name'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
