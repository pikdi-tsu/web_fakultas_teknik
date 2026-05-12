<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Information;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class AdminInformation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $activeCategory = null;
    public $activeRole = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingActiveCategory()
    {
        $this->resetPage();
    }
    
    public function updatingActiveRole()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();
        $roles = Role::all();

        $results = Information::query()->orderBy('created_at', 'desc')
            ->where('title', 'like', '%' . $this->search . '%')
            ->when($this->activeCategory, function($query) {
                $query->where('category_id', $this->activeCategory);
            })
            ->when($this->activeRole, function($query) {
                $query->where('role_id', $this->activeRole);
            })
            ->paginate(12);

        return view('livewire.admin.admin-information', ['informations' => $results, 'categories' => $categories, 'roles' => $roles]);
    }
}
