<?php

namespace App\View\Components;

use App\Models\Destination;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontDestinationsSectionComponent extends Component
{
    public $destinations;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->destinations = Destination::paginate(6);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-destinations-section-component');
    }
}
