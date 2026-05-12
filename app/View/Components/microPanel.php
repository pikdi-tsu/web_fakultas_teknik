<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class microPanel extends Component
{
    public $datas;
    public $panel;
    public $link;
    
    public function __construct(Collection $datas, $panel, $link)
    {
        $this->datas = $datas;
        $this->panel = $panel;
        
        $this->link = $link; 
    }

    public function render(): View|Closure|string
    {
        return view('components.micro-panel');
    }
}