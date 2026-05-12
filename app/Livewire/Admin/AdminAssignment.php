<?php

namespace App\Livewire\Admin;

use App\Models\Assignment;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAssignment extends Component
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
        $results = Assignment::query()
            ->orderBy('created_at', 'desc')
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->year, function ($query) {
                $query->where('year', $this->year); 
            })
            ->paginate(10);

        $availableYears = Assignment::select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
            
        return view('livewire.admin.admin-assignment', ['assignments' => $results, 'availableYears' => $availableYears]);
    }
}
