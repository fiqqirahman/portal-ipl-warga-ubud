<?php

namespace App\Enums;

enum StatusRegistrasiEnum: string {
    case Draft = 'draft';
	case Approved = 'approved';
	case Analysis = 'analysis';
	case VerificationDocuments = 'verification_documents';
	case Rejected = 'rejected';
	case RevisionDocuments = 'revision_documents';

    public function label(): string
    {
        return match($this) {
            self::Draft => 'Draft',
            self::Approved => 'Diterima',
            self::Analysis => 'Sedang Dalam Analisa',
            self::VerificationDocuments => 'Menunggu Status Verifikasi Dokumen',
            self::Rejected => 'Ditolak',
            self::RevisionDocuments => 'Revisi Dokumen',
        };
    }

    public static function getAll(bool $withKey = false, string $keyName = 'name'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
