<?php

namespace App\Livewire\Admin;

use App\Models\Publication;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPublication extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $year = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingYear()
    {
        $this->resetPage();
    }

    public function render()
    {
        $results = Publication::query()
            ->orderBy('created_at', 'desc')
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('team', 'like', '%' . $this->search . '%');
            })
            ->when($this->year, function ($query) {
                $query->where('year', $this->year); 
            })
            ->paginate(10);

        $availableYears = Publication::select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
            
        return view('livewire.admin.admin-publication', ['publications' => $results, 'availableYears' => $availableYears]);
    }
}
