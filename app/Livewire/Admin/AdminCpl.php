<?php

namespace App\Livewire\Admin;

use App\Models\Cpl;
use App\Models\Study;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCpl extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public Study $study;
    public $search = '';

    public function mount(Study $study)
    {
        $this->study = $study;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $results = Cpl::query()
            ->where('study_id', $this->study->id)
            ->where('code', 'like', '%' . $this->search . '%')
            ->orderBy('code')
            ->paginate(5);
            
        return view('livewire.admin.admin-cpl', ['cpls' => $results]);
    }
}
