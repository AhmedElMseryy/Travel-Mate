<?php

namespace App\View\Components;

use Closure;
use App\Models\Reservation;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class FrontShowReservation extends Component
{
    public $reservations;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user_id = Auth::user()->id;
        $this->reservations = Reservation::where('user_id', $user_id)
            ->with('destination')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-show-reservation');
    }
}
