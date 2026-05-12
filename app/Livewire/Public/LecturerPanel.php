<?php

namespace App\Livewire\Public;

use App\Models\Lecturer;
use Livewire\Component;
use Livewire\WithPagination;

class LecturerPanel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $program = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingProgram()
    {
        $this->resetPage();
    }

    public function render()
    {
        $results = Lecturer::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->when($this->program, function ($query) {
                $query->where('program', $this->program); 
            })
            ->paginate(10);

        $availablePrograms = Lecturer::select('program')
            ->distinct()
            ->orderBy('program', 'desc')
            ->pluck('program');
            
        return view('livewire.public.lecturer-panel', ['lecturers' => $results, 'availablePrograms' => $availablePrograms]);
    }
}
