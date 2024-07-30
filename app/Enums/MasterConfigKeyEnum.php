<?php

namespace App\Enums;

enum MasterConfigKeyEnum: string {
	case SecuritySessionLifetime = 'security.session_lifetime';
	case StyleIsLayoutFullWidth = 'style.is_layout_full_width';
	
	public function label(): string
	{
		return match($this) {
			self::SecuritySessionLifetime => 'Security Session Lifetime',
			self::StyleIsLayoutFullWidth => 'Style Is Layout Full Width',
		};
	}
}
