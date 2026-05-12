<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class AdminService extends Component
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
        $results = Service::query()->orderBy('created_at', 'desc')
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.admin.admin-service', ['services' => $results]);
    }
}
