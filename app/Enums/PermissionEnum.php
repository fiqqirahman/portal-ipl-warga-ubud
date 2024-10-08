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
    case MasterStatusPerusahaanAccess = 'master_status_perusahaan_access';
    case MasterStatusPerusahaanCreate = 'master_status_perusahaan_create';
    case MasterStatusPerusahaanEdit = 'master_status_perusahaan_edit';
    case MasterKategoriVendorAccess = 'master_kategori_vendor_access';
    case MasterKategoriVendorCreate = 'master_kategori_vendor_create';
    case MasterKategoriVendorEdit = 'master_kategori_vendor_edit';
    case RegistrasiVendorAccess = 'registrasi_vendor_access';
    case RegistrasiVendorCreate = 'registrasi_vendor_create';
    case RegistrasiVendorEdit = 'registrasi_vendor_edit';


}
