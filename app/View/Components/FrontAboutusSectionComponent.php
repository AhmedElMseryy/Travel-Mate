<?php

namespace App\View\Components;

use App\Models\About;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontAboutusSectionComponent extends Component
{
    public $abouts;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->abouts = About::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-aboutus-section-component');
    }
}
