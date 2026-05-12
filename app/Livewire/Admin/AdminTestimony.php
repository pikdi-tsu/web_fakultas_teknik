<?php

namespace App\Livewire\Admin;

use App\Models\Testimony;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTestimony extends Component
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
        $results = Testimony::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            
        return view('livewire.admin.admin-testimony',  ['testimonies' => $results]);
    }
}
