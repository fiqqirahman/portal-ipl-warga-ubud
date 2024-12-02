<?php

namespace App\Enums;

enum UserVendorTypeEnum: string {
    case Internal = 'internal';
	case Individual = 'individual';
	case Company = 'company';

    public function label(): string
    {
        return match($this) {
            self::Internal => 'Bukan Vendor (Internal)',
            self::Individual => 'Perorangan',
            self::Company => 'Perusahaan',
        };
    }
	
	public function badge(?string $class = null): string
	{
		return match($this) {
			self::Internal => '<span class="badge badge-secondary '. $class .'">'. self::Internal->label() .'</span>',
			self::Individual => '<span class="badge badge-primary '. $class .'">'. self::Individual->label() .'</span>',
			self::Company => '<span class="badge badge-info '. $class .'">'. self::Company->label() .'</span>',
		};
	}
	
	public static function getAll(bool $withKey = false, string $keyName = 'name'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
