<?php

namespace App\Enums;

enum PermissionEnum: string
{
	case UtilityAccess = 'utility_access';
	case DebugEagleEyeAccess = 'debug_eagle_eye_access';
	case MasterConfigAccess = 'master_config_access';
	
    case MasterJenisVendorAccess = 'master_jenis_vendor_access';
    case MasterJenisVendorCreate = 'master_jenis_vendor_create';
    case MasterJenisVendorEdit = 'master_jenis_vendor_edit';
	
    case MasterBentukBadanUsahaAccess = 'master_bentuk_badan_usaha_access';
    case MasterBentukBadanUsahaCreate = 'master_bentuk_badan_usaha_create';
    case MasterBentukBadanUsahaEdit = 'master_bentuk_badan_usaha_edit';

    case MasterKategoriVendorAccess = 'master_kategori_vendor_access';
    case MasterKategoriVendorCreate = 'master_kategori_vendor_create';
    case MasterKategoriVendorEdit = 'master_kategori_vendor_edit';
	
    case RegistrasiVendorAccess = 'registrasi_vendor_access';
    case RegistrasiVendorCreate = 'registrasi_vendor_create';
    case RegistrasiVendorEdit = 'registrasi_vendor_edit';
    case RegistrasiVendorDetail = 'registrasi_vendor_detail';
    case RegistrasiVendorApproval = 'registrasi_vendor_approval';

    case MasterDokumenAccess = 'master_dokumen_access';
    case MasterDokumenCreate = 'master_dokumen_create';
    case MasterDokumenEdit = 'master_dokumen_edit';
    case MasterBankAccess = 'master_bank_access';
    case MasterBankCreate = 'master_bank_create';
    case MasterBankEdit = 'master_bank_edit';
    case MasterSubBidangUsahaAccess = 'master_sub_bidang_usaha_access';
    case MasterSubBidangUsahaCreate = 'master_sub_bidang_usaha_create';
    case MasterSubBidangUsahaEdit = 'master_sub_bidang_usaha_edit';
    case MasterKualifikasiGradeAccess = 'master_kualifikasi_grade_access';
    case MasterKualifikasiGradeCreate = 'master_kualifikasi_grade_create';
    case MasterKualifikasiGradeEdit = 'master_kualifikasi_grade_edit';
    case MasterJenisIdentitasAccess = 'master_jenis_identitas_access';
    case MasterJenisIdentitasCreate = 'master_jenis_identitas_create';
    case MasterJenisIdentitasEdit = 'master_jenis_identitas_edit';
    case MasterJabatanVendorAccess = 'master_jabatan_vendor_access';
    case MasterJabatanVendorCreate = 'master_jabatan_vendor_create';
    case MasterJabatanVendorEdit = 'master_jabatan_vendor_edit';
    case MasterJenisInventarisAccess = 'master_jenis_inventaris_access';
    case MasterJenisInventarisCreate = 'master_jenis_inventaris_create';
    case MasterJenisInventarisEdit = 'master_jenis_inventaris_edit';
    case MasterJenisMerkInventarisAccess = 'master_jenis_merk_inventaris_access';
    case MasterJenisMerkInventarisCreate = 'master_jenis_merk_inventaris_create';
    case MasterJenisMerkInventarisEdit = 'master_jenis_merk_inventaris_edit';



    public static function getAll(bool $withKey = false, string $keyName = 'name'): array
	{
		return array_map(fn($case) => $withKey ? [$keyName => $case->value] : $case->value, self::cases());
	}
}
