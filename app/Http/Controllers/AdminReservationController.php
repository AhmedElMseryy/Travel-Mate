<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminReservationController extends Controller
{

    #=============================== INDEX
    public function index()
    {
        // $user_id = Auth::user()->id;
        $reservations = Reservation::paginate(6);

        return view('admin.reservations.index', get_defined_vars());
    }

    #=============================== DELETE
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservations.index')->with('delete_success', 'Deleted Successfully');
    }
}
