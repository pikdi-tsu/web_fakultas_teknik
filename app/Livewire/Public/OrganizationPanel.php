<?php

namespace App\Livewire\Public;

use App\Models\Organization;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationPanel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $organization = Organization::orderBy('created_at', 'desc')->get();
        return view('livewire.public.organization-panel', ['organizations' => $organization]);
    }
}
