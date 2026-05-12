<?php

namespace App\Livewire\Public;

use App\Models\Practice;
use Livewire\Component;
use Livewire\WithPagination;

class PracticePanel extends Component
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
        $results = Practice::query()->orderBy('created_at', 'desc')
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('nim', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.public.practice-panel', ['practices' => $results]);
    }
}
