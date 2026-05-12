<?php

namespace App\Livewire\Admin;

use App\Models\Organization;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrganization extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $results = Organization::query()->orderBy('created_at', 'desc')
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.admin.admin-organization', ['organizations' => $results]);
    }
}
