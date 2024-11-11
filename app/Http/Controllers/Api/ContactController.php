<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreMessageRequest $request)
    {
        $data = $request->validated();
        $record = Contact::create($data);
        if ($record) {
            return ApiResponse::senResponse(201, 'Sent Successfully', []);
        }
    }
}
