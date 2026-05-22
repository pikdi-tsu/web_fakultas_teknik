<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads; // Wajib untuk upload file
use App\Models\Testimony;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminTestimonyPost extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $image;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required|max:230',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        $filename = 'testimoni_' . Str::random(40) . '.webp';
        $path = 'uploads/' . $filename;

        $manager = new ImageManager(new Driver());
        $img = $manager->read($this->image->getRealPath());
        $img->scaleDown(width: 1200);
        $encodedImage = $img->toWebp(quality: 85);

        Storage::disk('public')->put($path, $encodedImage->toString());

        Testimony::create([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $path
        ]);

        $this->image->delete();
        $this->reset('image');

        session()->flash('success', 'Data Berhasil Dibuat!');
        return redirect()->to('/testimonies');
    }

    public function render()
    {
        return view('livewire.admin.admin-testimony-post');
    }
}
