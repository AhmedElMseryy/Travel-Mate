<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\GuideResource;
use App\Models\Guide;

class GuideController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $guides = Guide::all();

        return ApiResponse::senResponse(200, 'Guides Retrived successfully', GuideResource::collection($guides));
    }
}
