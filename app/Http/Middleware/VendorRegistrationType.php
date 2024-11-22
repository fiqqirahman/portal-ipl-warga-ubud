<?php

namespace App\Http\Middleware;

use App\Enums\UserVendorTypeEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VendorRegistrationType
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
	    $user = Auth::user();
		$message = 'Wrong Vendor Type';
	    
	    if($request->routeIs('menu.registrasi-vendor.*') && $user->vendor_type === UserVendorTypeEnum::Company){
		    abort(403, $message);
	    }
	    
	    if($request->routeIs('menu.registrasi-vendor-perusahaan.*') && $user->vendor_type === UserVendorTypeEnum::Individual){
		    abort(403, $message);
	    }

        return $next($request);
    }
}
