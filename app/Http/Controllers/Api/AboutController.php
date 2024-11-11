<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Resources\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $abouts = About::find(1);
        if ($abouts) {
            return ApiResponse::senResponse(200, 'Abouts Data Retrived Successfully', new AboutResource($abouts));
        }
        return ApiResponse::senResponse(200, 'Abouts Section is empty', []);
    }
}
