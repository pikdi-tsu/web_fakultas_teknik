<?php

namespace App\Livewire\Public;

use App\Models\Assignment;
use Livewire\Component;
use Livewire\WithPagination;

class AssignmentPanel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $year = '';
    public $program = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingYear()
    {
        $this->resetPage();
    }

    public function updatingProgram()
    {
        $this->resetPage();
    }

    public function render()
    {
        $results = Assignment::query()
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->year, function ($query) {
                $query->where('year', $this->year); 
            })
            ->when($this->program, function ($query) {
                $query->where('program', $this->program); 
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $availableYears = Assignment::select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $availablePrograms = Assignment::select('program')
            ->distinct()
            ->orderBy('program', 'asc')
            ->pluck('program');

        return view('livewire.public.assignment-panel', ['assignments' => $results, 'availableYears' => $availableYears, 'availablePrograms' => $availablePrograms]);
    }
}
