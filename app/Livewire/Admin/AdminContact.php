<?php

namespace App\Livewire\Admin;

use App\Models\Contact;
use App\Models\Help;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContact extends Component
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
        $help = Help::all();
        $results = Contact::query()
            ->where('label', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            
        return view('livewire.admin.admin-contact', ['contacts' => $results, 'helps' => $help]);
    }
}
