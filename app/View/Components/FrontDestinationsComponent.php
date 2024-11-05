<?php

namespace App\View\Components;

use App\Models\Destination;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontDestinationsComponent extends Component
{
    public $destinations;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->destinations = Destination::take(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-destinations-component');
    }
}
