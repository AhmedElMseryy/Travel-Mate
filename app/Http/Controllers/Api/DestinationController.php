<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use App\Http\Resources\SearchDestinationResource;

class DestinationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $destinations = Destination::get();
        if (count($destinations) > 0) {
            return ApiResponse::senResponse(200, 'Destinations Retrived Successfully', DestinationResource::collection($destinations));
        } else {
            return ApiResponse::senResponse(200, 'Destinations is empty', []);
        }
    }
}
