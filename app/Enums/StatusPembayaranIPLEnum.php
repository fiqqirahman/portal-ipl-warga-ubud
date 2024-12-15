<?php

namespace App\Enums;

enum StatusPembayaranIPLEnum: string {
    case Pending = 'pending';
	case Checked = 'checked';
	case Approved = 'Approved';
    case Rejected = 'rejected';

    public function label(): string
    {
        return match($this) {
            self::Pending => 'Pending',
            self::Checked => 'Sedang Dalam Analisa',
            self::Approved => 'Diterima',
            self::Rejected => 'Ditolak',
        };
    }

	public function badge(?string $class = null): string
	{
		return match($this) {
			self::Pending => '<span class="badge badge-secondary '. $class .'">'. self::Pending->label() .'</span>',
			self::Checked => '<span class="badge badge-outline badge-info '. $class .'">'. self::Checked->label() .'</span>',
			self::Approved => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Approved->label() .'</span>',
			self::Rejected => '<span class="badge badge-outline badge-danger '. $class .'">'. self::Rejected->label() .'</span>',
		};
	}

    public static function getAll(bool $withKey = false, string $keyName = 'name'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
