<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Testimony;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminTestimonyEdit extends Component
{
    use WithFileUploads;

    public Testimony $testimony;
    public $name;
    public $description;
    public $image;
    public $existingImage;

    public function mount(Testimony $testimony)
    {
        $this->testimony = $testimony;
        $this->name = $testimony->name;
        $this->description = $testimony->description;
        $this->existingImage = $testimony->image;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required|max:230',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        if ($this->image) {
            if ($this->existingImage && Storage::disk('public')->exists($this->existingImage)) {
                Storage::disk('public')->delete($this->existingImage);
            }

            $filename = 'testimoni_' . Str::random(40) . '.webp';
            $path = 'uploads/' . $filename;

            $manager = new ImageManager(new Driver());
            $img = $manager->read($this->image->getRealPath());
            $img->scaleDown(width: 1200);
            $encodedImage = $img->toWebp(quality: 75);

            Storage::disk('public')->put($path, $encodedImage->toString());

            $this->testimony->update([
                'name' => $this->name,
                'description' => $this->description,
                'image' => $path
            ]);

            $this->image->delete();
            $this->reset('image');
            
        } else {
            $this->testimony->update([
                'name' => $this->name,
                'description' => $this->description
            ]);
        }

        session()->flash('success', 'Data Berhasil Di-update!');
        return redirect()->to('/testimonies');
    }

    public function render()
    {
        return view('livewire.admin.admin-testimony-edit');
    }
}
