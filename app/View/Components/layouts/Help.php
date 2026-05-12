<?php

namespace App\View\Components\layouts;

use App\Models\Help as ModelsHelp;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Help extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $helps = ModelsHelp::all();

        return view('components.layouts.help', compact('helps'));
    }
}
