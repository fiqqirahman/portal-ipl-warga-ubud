<?php

namespace App\Http\Middleware;

use App\Enums\MasterConfigKeyEnum;
use App\Helpers\CacheForeverHelper;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\s;

class AuthenticateWithCheckUsersExpired
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $todayDate = Carbon::now()->toDateString();
        $expiredPassword = auth()->user()->expired_password ?? false;
        if (!$expiredPassword || $todayDate >= $expiredPassword) { // jika password expired
			if((boolean) CacheForeverHelper::getSingle(MasterConfigKeyEnum::SSOIsLocal)){
				Session::flush();
                if(str_starts_with((string) auth()->user()->username, '9999')){
                    sweetAlert('warning', 'Password Anda sudah Expired, mohon ganti Password Anda');
                } else {
				    sweetAlert('warning', 'Password Anda sudah Expired, mohon ganti Password Anda di Portal SSO');
                }
                Auth::logout();

                return to_route('auth.login');
			}
            return to_route('auth.expired-password');
        }
        
        return $next($request);
    }
}
