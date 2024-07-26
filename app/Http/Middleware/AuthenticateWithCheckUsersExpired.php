<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            return to_route('auth.expired-password');
        }
        
        return $next($request);
    }
}
