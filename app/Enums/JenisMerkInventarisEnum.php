<?php

namespace App\Enums;

enum JenisMerkInventarisEnum: string {
    case HpColorLaser = 'HP Color Laser 159NW';
    case EpsonL355 = 'Epson L355';
    case EpsonL3210 = 'Epson L3210';
    case AsusVivobook = 'Asus Vivobook 14 A1400EA VIPS351';
    case BeseusOrangeDotWireless = 'Beseus Orange Dot Wireless Presenter';
    case EpsonEBX500 = 'Epson EBX500';


    public function label(): string
    {
        return match($this) {
            self::HpColorLaser => 'HP Color Laser 159NW',
            self::EpsonL355 => 'Epson L355',
            self::EpsonL3210 => 'Epson L3210',
            self::AsusVivobook => 'Asus Vivobook 14 A1400EA VIPS351',
            self::BeseusOrangeDotWireless => 'Beseus Orange Dot Wireless Presenter',
            self::EpsonEBX500 => 'Epson EBX500',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::HpColorLaser => '<span class="badge badge-outline badge-primary '. $class .'">'. self::HpColorLaser->label() .'</span>',
            self::EpsonL355 => '<span class="badge badge-outline badge-primary '. $class .'">'. self::EpsonL355->label() .'</span>',
            self::EpsonL3210 => '<span class="badge badge-outline badge-primary '. $class .'">'. self::EpsonL3210->label() .'</span>',
            self::AsusVivobook => '<span class="badge badge-outline badge-primary '. $class .'">'. self::AsusVivobook->label() .'</span>',
            self::BeseusOrangeDotWireless => '<span class="badge badge-outline badge-primary '. $class .'">'. self::BeseusOrangeDotWireless->label() .'</span>',
            self::EpsonEBX500 => '<span class="badge badge-outline badge-primary '. $class .'">'. self::EpsonEBX500->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
