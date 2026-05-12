<?php

namespace App\Livewire\Public;

use App\Models\Cpl;
use App\Models\Curriculum;
use App\Models\Study;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class CurriculumPanel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public Study $study;
    public $activeSemester = '';

    public function mount(Study $study)
    {
        $this->study = $study;
    }

    public function render()
    {
        $curriculum = Curriculum::where('study_id', $this->study->id)->first();
        $cpl = Cpl::where('study_id', $this->study->id)->orderBy('code')->paginate(5);
        
        $availableSemesters = Subject::where('study_id', $this->study->id)
            ->select('semester')
            ->distinct()
            ->orderBy('semester')
            ->pluck('semester');
        $subjectQuery = Subject::where('study_id', $this->study->id)->orderBy('semester');

        if ($this->activeSemester !== '') {
            $subjectQuery->where('semester', $this->activeSemester);
        }

        $subjects = $subjectQuery->get();

        return view('livewire.public.curriculum-panel', [
            'curriculum' => $curriculum, 
            'cpls' => $cpl, 
            'subjects' => $subjects,
            'availableSemesters' => $availableSemesters
        ]);
    }
}
