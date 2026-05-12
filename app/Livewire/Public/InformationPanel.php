<?php

namespace App\Livewire\Public;

use App\Models\Category;
use App\Models\Information;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class InformationPanel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    #[Url(as: 'kategori', except: null)]
    public $activeCategory = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingActiveCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::all();

        $results = Information::query()->orderBy('created_at', 'desc')
            ->where('title', 'like', '%' . $this->search . '%')
            ->when($this->activeCategory, function($query) {
                $query->where('category_id', $this->activeCategory);
            })
            ->paginate(12);

        return view('livewire.public.information-panel', ['informations' => $results, 'categories' => $categories]);
    }
}