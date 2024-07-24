<?php

namespace App\Services\Clients;

use App\Models\User;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class SSOClient
{
    private string $url;
    private string $channel;

    public static string $SUCCESS = '00';
	public static string $SUCCESS_WITH_CHANGE_PASSWORD = '10';

    public function __construct()
    {
        $this->url = config('sso.api_url');
        $this->channel = config('sso.api_channel');
    }

    public function login(string $username, string $password)
    {
        try {
            $response = Http::post($this->url . '/service-sso/login', [
                'username' => $username,
                'password' => $password,
                'channel' => $this->channel,
                'ip_address_client' => Request::ip(),
            ]);

            if ($response->status() != 200)
                return [
                    'status' => true,
                    'statusCode' => 'OK',
                    'result' => [
                        'response_code' => '99',
                        'response_message' => 'Error Occured',
                    ]
                ];

            return $response->json();
        } catch (Exception $ex) {
            Log::error($ex);

            return [
                'status' => true,
                'statusCode' => 'OK',
                'result' => [
                    'response_code' => '99',
                    'response_message' => 'Error Occured',
                ]
            ];
        }
    }
	
	public function loginViaPublic(string $username, string $password): mixed
	{
        try {
            $response = Http::post($this->url . '/service-sso/loginViaPublic', [
                'username' => $username,
                'password' => $password,
                'channel' => $this->channel,
                'ip_address_client' => Request::ip(),
            ]);

            if ($response->status() != 200)
                return [
                    'status' => true,
                    'statusCode' => 'OK',
                    'result' => [
                        'response_code' => '99',
                        'response_message' => 'Error Occured',
                    ]
                ];

            return $response->json();
        } catch (Exception $ex) {
            Log::error($ex);

            return [
                'status' => true,
                'statusCode' => 'OK',
                'result' => [
                    'response_code' => '99',
                    'response_message' => 'Error Occured',
                ]
            ];
        }
    }
	
	public function loginViaPortalSSO(array $params): mixed
	{
		try {
			$response = Http::post($this->url . '/service-sso/login-via-portal-sso', [
				...$params,
				'ip_address_client' => Request::ip()
			]);
			
			if ($response->status() != 200)
				return [
					'status' => true,
					'statusCode' => 'OK',
					'result' => [
						'response_code' => '99',
						'response_message' => 'Error Occured',
					]
				];
			
			return $response->json();
		} catch (Exception $e) {
			Log::error('[loginViaPortalSSO] Exception HTTP Request', [
				'message' => $e->getMessage(),
				'errors' => $e->getTraceAsString()
			]);
			
			return [
				'status' => true,
				'statusCode' => 'OK',
				'result' => [
					'response_code' => '99',
					'response_message' => 'Error Occured',
				]
			];
		}
	}
	
    public function getJabatan(): mixed
    {
        try {
            $response = Http::get($this->url . '/service-sso/getlistalljabatan');

            if ($response->status() != 200)
                return [
                    'status' => false,
                    'statusCode' => 'Failed',
                    'result' => [
                        'response_code' => '99',
                        'response_message' => 'Error Occured',
                    ]
                ];

            return $response->json();
        } catch (Exception $ex) {
            Log::error($ex);

            return [
                'status' => false,
                'statusCode' => 'Failed',
                'result' => [
                    'response_code' => '99',
                    'response_message' => 'Error Occured',
                ]
            ];
        }
    }

    public function getTingkatan(): mixed
    {
        try {
            $response = Http::get($this->url . '/service-sso/getlistalltingkatan');

            if ($response->status() != 200)
                return [
                    'status' => false,
                    'statusCode' => 'Failed',
                    'result' => [
                        'response_code' => '99',
                        'response_message' => 'Error Occured',
                    ]
                ];

            return $response->json();
        } catch (Exception $ex) {
            Log::error($ex);

            return [
                'status' => false,
                'statusCode' => 'Failed',
                'result' => [
                    'response_code' => '99',
                    'response_message' => 'Error Occured',
                ]
            ];
        }
    }

    public function getUnitKerja(): mixed
    {
        try {
            $response = Http::get($this->url . '/service-sso/getlistallunitkerja');

            if ($response->status() != 200)
                return [
                    'status' => false,
                    'statusCode' => 'Failed',
                    'result' => [
                        'response_code' => '99',
                        'response_message' => 'Error Occured',
                    ]
                ];

            return $response->json();
        } catch (Exception $ex) {
            Log::error($ex);

            return [
                'status' => false,
                'statusCode' => 'Failed',
                'result' => [
                    'response_code' => '99',
                    'response_message' => 'Error Occured',
                ]
            ];
        }
    }
	
	public function updateOrCreateUserAfterAuthorize(array $response): User
	{
		$sessionId = $response['result']['detail_user']['session_id'] ?? null;
		
		return User::query()->updateOrCreate([
			'sso_user_id' => $response['result']['detail_user']['id'],
		], [
			'sso_user_id' => $response['result']['detail_user']['id'],
			'id_peg' => $response['result']['detail_user']['id_peg'] ?? 0,
			'name' => $response['result']['detail_user']['nama'] ?? '',
			'nrik' => $response['result']['detail_user']['nrik'] ?? '',
			'username' => $response['result']['detail_user']['username'] ?? '',
			'email' => $response['result']['detail_user']['email'] ?? '',
			'tanggal_lahir' => substr($response['result']['detail_user']['tanggal_lahir'], 0, 10) ?? '',
			'foto' => $response['result']['detail_user']['foto'] ?? '',
			'id_departemen' => $response['result']['detail_user']['id_departemen'] == 0 ? null : $response['result']['detail_user']['id_departemen'],
			'id_tingkatan' => $response['result']['detail_user']['id_tingkatan'],
			'id_jabatan' => $response['result']['detail_user']['id_jabatan'],
			'id_unit_kerja' => $response['result']['detail_user']['id_unit_kerja'],
			'id_divisi' => $response['result']['detail_user']['id_divisi'] == 0 ? null : $response['result']['detail_user']['id_divisi'],
			'expired_password' => $response['result']['detail_user']['expired_password'] ?? null,
			'is_blokir' => $response['result']['detail_user']['is_blokir'] ?? null,
			'session_id' => $sessionId,
			'last_seen' => now(),
			'last_activity' => now(),
		]);
	}
	
	public function getDepartemen(): mixed
	{
		try {
			$response = Http::get($this->url . '/service-sso/getlistalldepartemen');
			
			if ($response->status() != 200)
				return [
					'status' => false,
					'statusCode' => 'Failed',
					'result' => [
						'response_code' => '99',
						'response_message' => 'Error Occured',
					]
				];
			
			return $response->json();
		} catch (Exception $ex) {
			Log::error($ex);
			
			return [
				'status' => false,
				'statusCode' => 'Failed',
				'result' => [
					'response_code' => '99',
					'response_message' => 'Error Occured',
				]
			];
		}
	}
	
	public function getDivisi(): mixed
	{
		try {
			$response = Http::get($this->url . '/service-sso/getlistalldivisi');
			
			if ($response->status() != 200)
				return [
					'status' => false,
					'statusCode' => 'Failed',
					'result' => [
						'response_code' => '99',
						'response_message' => 'Error Occured',
					]
				];
			
			return $response->json();
		} catch (Exception $ex) {
			Log::error($ex);
			
			return [
				'status' => false,
				'statusCode' => 'Failed',
				'result' => [
					'response_code' => '99',
					'response_message' => 'Error Occured',
				]
			];
		}
	}
	
	public function getUserByNRIK($nrik): array|Response
	{
		try {
			$response = Http::post($this->url . '/service-sso/getuserbynrik', [
				'channel' => $this->channel,
				'nrik' => $nrik,
			]);
			
			if ($response->status() != 200)
				return [
					'status' => false,
					'statusCode' => 'Failed',
					'result' => [
						'response_code' => '99',
						'response_message' => 'Error Occured',
					]
				];
			
			return $response;
		} catch (Exception $ex) {
			Log::error($ex);
			
			return [
				'status' => false,
				'statusCode' => 'Failed',
				'result' => [
					'response_code' => '99',
					'response_message' => 'Error Occured',
				]
			];
		}
	}
	
	/**
	 * @param array $data
	 * @return bool
	 * @throws Exception
	 */
	public function validateLoginViaPortalSSO(array $data): bool
	{
		try {
			$expectedKeys = ['email', 'username', 'kode_aplikasi', 'time'];
			if (array_keys($data) !== $expectedKeys) {
				return throw new Exception('Required key : email, username, kode_aplikasi, time');
			}
			
			foreach ($data as $key => $val) {
				if(!$val){
					return throw new Exception(ucwords(str_replace('_',' ', $key)) . ' is empty!');
				}
			}
			
			return true;
		} catch (Exception $e) {
			Log::error('[Validate Params Login SSO] Error', [
				'message' => $e->getMessage()
			]);
			
			return throw new Exception($e->getMessage());
		}
	}
}
