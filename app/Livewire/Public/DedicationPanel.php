<?php

namespace App\Livewire\Public;

use App\Models\Dedication;
use Livewire\Component;
use Livewire\WithPagination;

class DedicationPanel extends Component
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
        $results = Dedication::query()
            ->orderBy('created_at', 'desc')
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('team', 'like', '%' . $this->search . '%');
            })
            ->when($this->year, function ($query) {
                $query->where('year', $this->year); 
            })
            ->paginate(10);

        $availableYears = Dedication::select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
            
        return view('livewire.public.dedication-panel', ['dedications' => $results, 'availableYears' => $availableYears]);
    }
}
