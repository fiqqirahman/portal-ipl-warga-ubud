<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionBrowser
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
        $session = Session::get('session_browser');
        $sessionUsers = auth()->user()->session_id;
        if ($session != $sessionUsers) {
			Auth::logout();
	        Session::forget('session_browser');
			
            return to_route('auth.login');
        }

        return $next($request);
    }
}
