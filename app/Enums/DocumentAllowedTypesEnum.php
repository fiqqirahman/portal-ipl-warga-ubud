<?php

namespace App\Enums;

enum DocumentAllowedTypesEnum: string {
	case PDF = 'pdf';
	case DOCX = 'docx';
	case DOC = 'doc';
	case PNG = 'png';
	case JPG = 'jpg';
	case JPEG = 'jpeg';
	case ZIP = 'zip';
	case RAR = 'rar';

    public function label(): string
    {
        return match($this) {
            self::PDF => 'PDF',
            self::DOCX => 'DOCX',
            self::DOC => 'DOC',
            self::PNG => 'PNG',
            self::JPG => 'JPG',
            self::JPEG => 'JPEG',
            self::ZIP => 'ZIP',
            self::RAR => 'RAR',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'name'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
