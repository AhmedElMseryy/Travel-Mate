<?php

namespace App\View\Components;

use App\Models\Guide;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontOurTeamComponent extends Component
{
    public $guides;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->guides = Guide::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-our-team-component');
    }
}
