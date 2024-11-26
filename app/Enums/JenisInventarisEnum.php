<?php

namespace App\Enums;

enum JenisInventarisEnum: string {
    case PrinterLaserjet = 'Printer Laser Jet';
    case PrinterAllInOne = 'Printer All in One';
    case NotebookPc = 'Notebook PC';
    case WirelessPresenter = 'Wireless Presenter';
    case Proyektor = 'Proyektor';
    case Monitor = 'Monitor';


    public function label(): string
    {
        return match($this) {
            self::PrinterLaserjet => 'Printer Laser Jet',
            self::PrinterAllInOne => 'Printer All in One',
            self::NotebookPc => 'Notebook PC',
            self::WirelessPresenter => 'Wireless Presenter',
            self::Proyektor => 'Proyektor',
            self::Monitor => 'Monitor',
        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::PrinterLaserjet => '<span class="badge badge-outline badge-primary '. $class .'">'. self::PrinterLaserjet->label() .'</span>',
            self::PrinterAllInOne => '<span class="badge badge-outline badge-primary '. $class .'">'. self::PrinterAllInOne->label() .'</span>',
            self::NotebookPc => '<span class="badge badge-outline badge-primary '. $class .'">'. self::NotebookPc->label() .'</span>',
            self::WirelessPresenter => '<span class="badge badge-outline badge-primary '. $class .'">'. self::WirelessPresenter->label() .'</span>',
            self::Proyektor => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Proyektor->label() .'</span>',
            self::Monitor => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Monitor->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
