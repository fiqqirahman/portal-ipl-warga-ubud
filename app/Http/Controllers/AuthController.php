<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Services\Clients\PortalSSOClient;
use App\Services\Clients\SSOClient;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginViaPublicSSO(LoginRequest $request)
    {
	    try {
		    $ssoClient = new SSOClient();
		    
		    $request['username'] = strtoupper($request->username);
		    
		    $response = $ssoClient->loginViaPublic($request->username, $request->password);
		    $responseCode = $response['result']['response_code'];
		    
		    if ($responseCode !== SSOClient::$SUCCESS && $responseCode !== SSOClient::$SUCCESS_WITH_CHANGE_PASSWORD) {
			    createLogActivity('[ViaPublic] Gagal login dengan username : ' . $request->username);
			    
			    return to_route('auth.login')
				    ->withInput()
				    ->with('response_code', $responseCode)
				    ->withErrors([$response['result']['response_message']]);
		    }
		    
		    if($responseCode === SSOClient::$SUCCESS_WITH_CHANGE_PASSWORD){
			    $sessionId = bin2hex(random_bytes(40));
			    Session::put('session_browser', $sessionId);
			    $user = User::where('username', $request->username)->first();
			    $user->expired_password = '1970-01-01';
			    $user->is_blokir = null;
			    $user->session_id = $sessionId;
			    $user->save();
		    } else {
			    // Response Code : 00
			    $user = $ssoClient->updateOrCreateUserAfterAuthorize($response);
			    $sessionId = $response['result']['detail_user']['session_id'] ?? null;
			    Session::put('session_browser', $sessionId);
		    }
		    
		    Auth::login($user);
		    sweetAlert('success','Selamat Datang!');
		    
		    if($responseCode === SSOClient::$SUCCESS_WITH_CHANGE_PASSWORD){
			    createLogActivity('[ViaPublic] Login With Change Password');
			    
			    return to_route('auth.change-password');
		    } else {
			    createLogActivity('[ViaPublic] Login');
			    
			    return to_route('index');
		    }
	    } catch (\Exception $e) {
			sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
		    return to_route('auth.login');
	    }
    }
	
	public function loginViaLocalSSO(LoginRequest $request)
	{
		try {
			$ssoClient = new SSOClient();
			
			$request['username'] = strtoupper($request->username);
			
			$response = $ssoClient->login($request->username, $request->password);
			if ($response['result']['response_code'] != SSOClient::$SUCCESS) {
				createLogActivity('[ViaLocal] Gagal login dengan username : ' . $request->username);
				return to_route('auth.login')
					->withInput()->with('response_code', $response['result']['response_code'])
					->withErrors([$response['result']['response_message']]);
			}
			
			$sessionId = $response['result']['detail_user']['session_id'] ?? null;
			
			$user = $ssoClient->updateOrCreateUserAfterAuthorize($response);
			
			Auth::login($user);
			createLogActivity('[ViaLocal] Login');
			Session::put('session_browser', $sessionId);
			sweetAlert('success','Selamat Datang!');
			
			return to_route('index');
		} catch (\Exception $e) {
			sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
			return to_route('auth.login');
		}
	}
	
	public function loginViaPortalSSO(string $email, string $username, string $kodeAplikasi, string $time)
	{
		try {
			$ssoClient = new SSOClient();
			
			$params = [
				'email' => $email,
				'username' => $username,
				'kode_aplikasi' => $kodeAplikasi,
				'time' => $time
			];
			
			$ssoClient->validateLoginViaPortalSSO($params);
			
			$response = $ssoClient->loginViaPortalSSO($params);
			
			if ($response['result']['response_code'] !== SSOClient::$SUCCESS) {
				createLogActivity('[ViaPortal] Gagal login');
				
				return to_route('auth.login')
					->withInput()
					->with('response_code', $response['result']['response_code'])
					->withErrors([$response['result']['response_message']]);
			}
			
			$user = $ssoClient->updateOrCreateUserAfterAuthorize($response);
			
			Auth::login($user);
			createLogActivity('[ViaPortal] Login');
			Session::put('session_browser', $user->session_id);
			
			sweetAlert('success', 'Selamat Datang!');
			return to_route('index');
		} catch (\Exception $e) {
			sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
			return to_route('auth.login');
		}
	}

    public function logout()
    {
        if (isset(Auth::user()->id)) {
            // update IP Address
	        Auth::user()->update([
                'ip_address' => null,
            ]);

            createLogActivity('Logout');
            
            Session::flush();
            Auth::logout();
        }

        return to_route('auth.login');
    }

    public function changePassword()
    {
        $title = 'Change Password';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            [$title, route('auth.change-password')]
        ];

        return view('auth.change-password', compact('title', 'breadcrumbs'));
    }

    public function changePasswordSubmit(ChangePasswordRequest $request)
    {
	    try {
			$user = Auth::user();
		    $response = (new PortalSSOClient())->changePassword($request, $user->nrik);
		    
		    $statusCode = $response->status();
		    $responseJson = $response->json();
		    if($statusCode == 200 && $responseJson['success']){
			    createLogActivity('Ubah password');
			    
			    $user->update($responseJson['data']['user']);
			    
			    sweetAlert('success', 'Password berhasil diperbarui');
			    return to_route('index');
		    } else if($statusCode == 422) {
				$errors = [];
				foreach ($responseJson['data'] as $field => $value){
					$errors[$field] = $value[0];
				}
				
				sweetAlert('error', 'Perikasa kembali Inputan Anda!');
			    return back()->withErrors($errors)->withInput();
		    } else {
			    sweetAlert('warning', $responseJson['message']);
			    return back();
		    }
	    } catch (\Exception $e) {
			sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
		    return back();
	    }
    }

    public function expiredPassword()
    {
        return view('auth.expired-password');
    }
	
	public function forgotPassword()
	{
		$title = 'Forgot Password';
		
		return view('auth.forgot-password', [
			'title' => $title,
			'breadcrumbs' => [$title, route('auth.change-password')]
		]);
	}
	
	public function forgotPasswordValidate(ForgotPasswordRequest $request)
	{
		try {
			$response = (new PortalSSOClient())->forgotPassword($request->email);
			
			$statusCode = $response->status();
			$responseJson = $response->json();
			if($statusCode == 200 && $responseJson['success']){
				sweetAlert('success', 'Berhasil mengirim Password Baru ke Email Anda');
				return back();
			} else if($statusCode == 422) {
				sweetAlert('error', 'Perikasa kembali Inputan Anda!');
				return back()
					->withErrors(['email' => $responseJson['data']['email'][0]])
					->withInput();
			} else {
				sweetAlert('warning', $responseJson['message']);
				return back();
			}
		} catch (\Exception $e) {
			sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);
			return back();
		}
	}
}
