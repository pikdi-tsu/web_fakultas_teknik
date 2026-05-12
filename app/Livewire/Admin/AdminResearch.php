<?php

namespace App\Livewire\Admin;

use App\Models\Research;
use Livewire\Component;
use Livewire\WithPagination;

class AdminResearch extends Component
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
        $results = Research::query()
            ->orderBy('created_at', 'desc')
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('team', 'like', '%' . $this->search . '%');
            })
            ->when($this->year, function ($query) {
                $query->where('year', $this->year); 
            })
            ->paginate(10);

        $availableYears = Research::select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('livewire.admin.admin-research', ['researchs' => $results, 'availableYears' => $availableYears]);
    }
}
