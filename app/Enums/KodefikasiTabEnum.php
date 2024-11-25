<?php

namespace App\Enums;

enum KodefikasiTabEnum: string {
    case PengalamanPekerjaan3TahunTerakhir = 'Pengalaman Pekerjaan 3 Tahun Terakhir';
    case MitraUsaha = 'Mitra Usaha';
    case PekerjaanBerjalan = 'Pekerjaan Berjalan';


    public function label(): string
    {
        return match($this) {
            self::PengalamanPekerjaan3TahunTerakhir => 'Pengalaman Pekerjaan 3 Tahun Terakhir',
            self::MitraUsaha => 'Mitra Usaha',
            self::PekerjaanBerjalan => 'Pekerjaan Berjalan',

        };
    }

    public function badge(?string $class = null): string
    {
        return match($this) {
            self::PengalamanPekerjaan3TahunTerakhir => '<span class="badge badge-outline badge-primary '. $class .'">'. self::PengalamanPekerjaan3TahunTerakhir->label() .'</span>',
            self::MitraUsaha => '<span class="badge badge-outline badge-primary '. $class .'">'. self::MitraUsaha->label() .'</span>',
            self::PekerjaanBerjalan => '<span class="badge badge-outline badge-primary '. $class .'">'. self::PekerjaanBerjalan->label() .'</span>',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'nama'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
