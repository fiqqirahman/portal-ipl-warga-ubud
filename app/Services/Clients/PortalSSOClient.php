<?php

namespace App\Services\Clients;

use Exception;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class PortalSSOClient
{
    private string $url;
    private string $token;

    public function __construct()
    {
        $this->url = config('sso.portal_sso_url');
        $this->token = config('sso.portal_sso_token');
    }
	
	/**
	 * @throws Exception
	 */
	public function forgotPassword(string $email): PromiseInterface|Response
	{
		try {
			return Http::withHeaders([
				'X-SSO-ROUTE-TOKEN' => enkripSHA256($this->token)
			])->post($this->url . '/api/auth/forgot-password', [
				'email' => $email
			]);
		} catch (Exception $e) {
			logException('[forgotPassword] PortalSSOClient', $e);
			
			throw new Exception($e->getMessage());
		}
    }
	
	/**
	 * @throws Exception
	 */
	public function changePassword($request, string $nrik): PromiseInterface|Response
	{
		try {
			return Http::withHeaders([
				'X-SSO-ROUTE-TOKEN' => enkripSHA256($this->token)
			])->post($this->url . '/api/auth/change-password', [
				'nrik' => $nrik,
				'password' => $request->password,
				'password_baru' => $request->password_baru,
				'konfirmasi_password' => $request->konfirmasi_password,
			]);
		} catch (Exception $e) {
			logException('[changePassword] PortalSSOClient', $e);
			
			throw new Exception($e->getMessage());
		}
	}
}
