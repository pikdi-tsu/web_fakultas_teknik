<?php

namespace App\Livewire\Public;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentPanel extends Component
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
            
        return view('livewire.public.document-panel', ['documents' => $results]);
    }
}
