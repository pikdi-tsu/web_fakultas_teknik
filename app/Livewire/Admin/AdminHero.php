<?php

namespace App\Livewire\Admin;

use App\Models\Hero;
use Livewire\Component;
use Livewire\WithPagination;

class AdminHero extends Component
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
        $results = Hero::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            
        return view('livewire.admin.admin-hero', ['heroes' => $results]);
    }
}
