<?php

namespace App\Livewire\Public;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicePanel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';    

    public function render()
    {
        $service = Service::orderBy('created_at', 'desc')->paginate(9);
        return view('livewire.public.service-panel', ['services' => $service]);
    }
}
