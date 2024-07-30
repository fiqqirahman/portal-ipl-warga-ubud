<?php
	
namespace App\Http\Middleware;

use App\Services\ValidateTokenService;
use Closure;
use Illuminate\Http\Request;

class ValidateToken
{
	/**
	 * Handle an incoming request.
	 *
	 * @param Request $request
	 * @param Closure $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next): mixed
	{
		$token = $request->header('X-SSO-ROUTE-TOKEN');
		
		if (!ValidateTokenService::validate($token)) {
			return response()->json([
				'success' => false,
				'message' => 'Unauthorized'
			], 401);
		}
		
		return $next($request);
	}
}
