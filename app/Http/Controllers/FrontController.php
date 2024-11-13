<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscribe;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Admin;
use App\Notifications\NewUserReservationNotification;
use Illuminate\Support\Facades\Request as FacadesRequest;

class FrontController extends Controller
{
    #------------------------- INDEX
    public function index()
    {
        return view('front.index', get_defined_vars());
    }

    #------------------------- ABOUT
    public function about()
    {
        return view('front.about', get_defined_vars());
    }

    #------------------------- DESTINATION
    public function destination()
    {
        return view('front.destination', get_defined_vars());
    }

    #------------------------- CONTACT
    public function contact()
    {
        return view('front.contact', get_defined_vars());
    }

    #------------------------- RESERVATION SUBMIT
    public function reservation(Request $request)
    {
        $user_id = $request->user_id;
        $destination_id = $request->destination_id;
        $destination = Destination::find($destination_id);
        // dd($destination);

        ##--- send notification to admin
        // $admin = Admin::find(2);
        // $admin->notify(new NewUserReservationNotification($destination));

        return view('front.reservation-submit', get_defined_vars());
    }

    #------------------------- CONTACTS STORE
    public function contactStore(StoreMessageRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);

        return back()->with('contact_success_msg', 'Subscribed Successfully');
    }

    #------------------------- SUBSCRIBERS STORE
    public function subscriberStore(StoreSubscriberRequest $request)
    {
        $data = $request->validated();
        Subscribe::create($data);

        return back()->with('subscriber_success_msg', 'Subscribed Successfully');
    }
}
