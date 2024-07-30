<?php

namespace App\Enums;

enum MasterConfigKeyEnum: string {
	case SecuritySessionLifetime = 'security.session_lifetime';
	
	public function label(): string
	{
		return match($this) {
			self::SecuritySessionLifetime => 'Security Session Lifetime',
		};
	}
}
