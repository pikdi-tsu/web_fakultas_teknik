<?php

namespace App\Livewire\Admin;

use App\Models\Curriculum;
use App\Models\Study;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubject extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $semester = '';
    public $description = '';
    public Study $study;

    public function mount(Study $study)
    {
        $this->study = $study;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSemester()
    {
        $this->resetPage();
    }
    
    public function updatingDescription()
    {
        $this->resetPage();
    }
        
    public function render()
    {
        $results = Subject::query()
            ->where('study_id', $this->study->id)
            ->where('name', 'like', '%' . $this->search . '%')
            ->when($this->semester, function ($query) {
                $query->where('semester', $this->semester); 
            })
            ->when($this->description, function ($query) {
                $query->where('description', $this->description); 
            })
            ->orderBy('semester')
            ->paginate(10);

        $availableSemesters = Subject::select('semester')
            ->distinct()
            ->orderBy('semester', 'asc')
            ->pluck('semester');

        $availableDescriptions = Subject::select('description')
            ->distinct()
            ->orderBy('description', 'asc')
            ->pluck('description');
        
        return view('livewire.admin.admin-subject', ['subjects' => $results, 'availableSemesters' => $availableSemesters, 'availableDescriptions' => $availableDescriptions]);
    }
}
