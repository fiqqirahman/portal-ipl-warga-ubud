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
}
