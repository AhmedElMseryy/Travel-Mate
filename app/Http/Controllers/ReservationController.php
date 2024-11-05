<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ReservationController extends Controller
{
    #=============================== INDEX
    public function index()
    {
        return view('front.show', get_defined_vars());
    }

    #=============================== CREATE
    public function create()
    {
        //
    }

    #=============================== STORE
    public function store(StoreReservationRequest $request)
    {
        // dd($data);
        $data = $request->validated();
        Reservation::create($data);

        return to_route('reservations.index');
    }

    #=============================== SHOW
    public function show(Reservation $reservation)
    {
        //
    }

    #=============================== EDIT
    public function edit(Reservation $reservation)
    {
        //
    }

    #=============================== UPDATE
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    #=============================== DELETE
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservations.index')->with('delete_success', 'Deleted Successfully');
    }
}
