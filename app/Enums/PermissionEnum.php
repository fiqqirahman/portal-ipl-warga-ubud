<?php

namespace App\Enums;

enum PermissionEnum: string
{
	case UtilityAccess = 'utility_access';
	case DebugEagleEyeAccess = 'debug_eagle_eye_access';
	case MasterConfigAccess = 'master_config_access';
}
