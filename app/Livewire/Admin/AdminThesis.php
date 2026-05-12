<?php

namespace App\Livewire\Admin;

use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithPagination;

class AdminThesis extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField !== $field) {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        } 
        elseif ($this->sortDirection === 'asc') {
            $this->sortDirection = 'desc';
        } 
        else {
            $this->sortField = 'created_at';
            $this->sortDirection = 'desc';
        }
    }

    public function render()
    {
        $results = Thesis::query()->orderBy($this->sortField, $this->sortDirection)
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('nim', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.admin.admin-thesis', ['theses' => $results]);
    }
}
