<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Role;
use App\Models\Information;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminInformationEdit extends Component
{
    use WithFileUploads;

    public Information $information;

    public $selectedOption = '';
    public $selectedLabel = '';
    public $showOtherInputs = true;
    public $otherInput;
    
    public $trixTempImage;

    public $description = '';

    public function mount(Information $information)
    {
        $this->information = $information;
        $this->otherInput = $information->author;
        $this->selectedLabel = $information->category->id;
        $this->selectedOption = $information->role->id;
        $this->checkOption($this->selectedOption);
    }

    protected function checkOption($value)
    {
        if ($value == '1') {
            $this->showOtherInputs = false;
            $this->otherInput = '';
        }
    }

    public function updatedSelectedOption()
    {
        $this->showOtherInputs = ($this->selectedOption === '2'||$this->selectedOption === '3');
        if ($this->selectedOption === '1') {
            $this->otherInput = '';
        }
    }

    public function uploadTrixImage()
    {
        $this->validate([
            'trixTempImage' => 'image|max:16000'
        ]);

        $filename = 'temp_inline_' . Str::random(40) . '.webp';
        $path = 'uploads/temp/' . $filename; 

        $manager = new ImageManager(new Driver());
        $image = $manager->read($this->trixTempImage->getRealPath());
        
        $image->scaleDown(width: 1200);
        $encodedImage = $image->toWebp(quality: 75);

        Storage::disk('public')->put($path, $encodedImage->toString());

        $this->trixTempImage->delete();

        $this->reset('trixTempImage');

        return asset('storage/' . $path);
    }

    public function render()
    {
        $category = Category::all();
        $role = Role::all();
        return view('livewire.admin.admin-information-edit', [
            'categories' => $category, 
            'roles' => $role
        ]);
    }
}
