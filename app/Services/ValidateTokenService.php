<?php

namespace App\Services;

class ValidateTokenService
{
	public static function validate(string|null $token): bool
	{
		try {
			if(empty($token)) {
				return false;
			}
			
			$token = dekripSHA256($token);
			
			if($token !== config('sso.portal_sso_token')){
				return false;
			}
			
			return true;
		} catch (\Exception $e) {
			return false;
		}
	}
}
