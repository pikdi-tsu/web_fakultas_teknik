<?php

namespace App\Livewire\Admin;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDocument extends Component
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
        $results = Document::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('livewire.admin.admin-document', ['documents' => $results]);
    }
}
