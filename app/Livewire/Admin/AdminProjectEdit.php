<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminProjectEdit extends Component
{
    use WithFileUploads;

    public Project $project;

    public $trixTempImage;

    public $description = '';

    public function mount(Project $project)
    {
        $this->project = $project;
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
        return view('livewire.admin.admin-project-edit');
    }
}
