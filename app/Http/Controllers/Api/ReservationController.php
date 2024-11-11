<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $reservations = Reservation::where('destination_id', $request->input('destination_id'))->get();
        // $reservations = Reservation::where([
        //     'destination_id' => $request->input('destination_id'),
        //     'user_id' => $request->input('user_id')
        // ])->get();

        if (count($reservations) > 0) {
            return ApiResponse::senResponse(200, 'Reservations Retrived successfully', ReservationResource::collection($reservations));
        }
        return ApiResponse::senResponse(200, 'Reservations is empty', []);
    }
}
