<?php

namespace App\Enums;

enum MasterConfigKeyEnum: string {
	case SecuritySessionLifetime = 'security.session_lifetime';
	case StyleIsLayoutFullWidth = 'style.is_layout_full_width';
	case SSOIsLocal = 'sso.is_local';
	case EmailPICNotification = 'email.pic_notification';
}
