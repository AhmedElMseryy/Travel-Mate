<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SearchDestinationResource;

class SearchDestinationController extends Controller
{
    public function index(Request $request)
    {
        $word = $request->has('search') ? $request->input('search') : null;
        $destinations = Destination::when($word != null, function ($q) use ($word) {
            $q->where('name', 'like', '%' . $word . '%');
        })->latest()->get();

        if (count($destinations) > 0) {
            return ApiResponse::senResponse(200, 'search completed', SearchDestinationResource::collection($destinations));
        }
        return ApiResponse::senResponse(200, 'No matching data', []);
    }
}
