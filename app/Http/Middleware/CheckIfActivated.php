<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->is_activated && !Auth::user()->id_peg) {
            Auth::logout();

            sweetAlert('error', 'Akun Anda belum diaktivasi. Silakan cek email untuk aktivasi.');

            return redirect()->route('auth.login')->with('error', 'Akun Anda belum diaktivasi. Silakan cek email untuk aktivasi.');
        }

        return $next($request);
    }
}
