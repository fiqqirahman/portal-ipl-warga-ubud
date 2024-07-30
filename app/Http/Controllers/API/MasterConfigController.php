<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Clients\MasterConfigClient;
use Illuminate\Http\Request;

class MasterConfigController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, MasterConfigClient $masterConfigClient)
    {
        return $masterConfigClient->handle($request);
    }
}
