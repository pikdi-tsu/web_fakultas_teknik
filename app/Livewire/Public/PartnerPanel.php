<?php

namespace App\Livewire\Public;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;

class PartnerPanel extends Component
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
        $results = Partner::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            
        return view('livewire.public.partner-panel', ['partners' => $results]);
    }
}
