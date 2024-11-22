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
            self::VerificationDocuments => 'Menunggu Verifikasi Dokumen',
            self::Rejected => 'Ditolak',
            self::RevisionDocuments => 'Revisi Dokumen',
        };
    }
	
	public function badge(?string $class = null): string
	{
		return match($this) {
			self::Draft => '<span class="badge badge-secondary '. $class .'">'. self::Draft->label() .'</span>',
			self::Approved => '<span class="badge badge-outline badge-primary '. $class .'">'. self::Approved->label() .'</span>',
			self::Analysis => '<span class="badge badge-outline badge-info '. $class .'">'. self::Analysis->label() .'</span>',
			self::VerificationDocuments => '<span class="badge badge-outline badge-success '. $class .'">'. self::VerificationDocuments->label() .'</span>',
			self::Rejected => '<span class="badge badge-outline badge-danger '. $class .'">'. self::Rejected->label() .'</span>',
			self::RevisionDocuments => '<span class="badge badge-outline badge-warning '. $class .'">'. self::RevisionDocuments->label() .'</span>'
		};
	}

    public static function getAll(bool $withKey = false, string $keyName = 'name'): array
    {
        return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
    }
}
