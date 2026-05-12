<?php

namespace App\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPartner extends Component
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
        $results = Partner::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            
        return view('livewire.admin.admin-partner', ['partners' => $results]);
    }
}
