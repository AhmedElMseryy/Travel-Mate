<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreSubscriberRequest $request)
    {
        $data = $request->validated();
        $record = Subscribe::create($data);

        if ($record) {
            return ApiResponse::senResponse(201, 'Sent Successfully', []);
        }
    }
}
