<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Admin;
use App\Notifications\NewUserReservationNotification;
use Illuminate\Support\Facades\Notification;

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
        $data = $request->validated();

        // التحقق مما إذا كان الحجز موجودًا بالفعل
        $existingReservation = Reservation::where('user_id', $data['user_id'])
            ->where('destination_id', $data['destination_id'])
            ->first();

        if ($existingReservation) {
            // إعادة توجيه مع رسالة خطأ
            return to_route('front.destination')->with('error', 'You have already reserved this trip.');
        }

        // إذا لم يكن هناك حجز سابق، قم بإنشاء الحجز الجديد
        $reservation = Reservation::create($data);

        // إرسال الإشعار إلى المدير
        $admin = Admin::find(2);
        if ($admin) {
            Notification::send($admin, new NewUserReservationNotification($reservation));
            // $admin->notify(new NewUserReservationNotification($reservation));
        }

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
        return to_route('reservations.index')->with('delete_success', 'Deleted Successfully');
    }
}
