<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Lecturer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminLecturerPost extends Component
{
    use WithFileUploads;

    public $name;
    public $position;
    public $program;
    public $description;
    public $picture;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'position' => 'required',
            'program' => 'required',
            'description' => 'nullable',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:16000',
        ]);

        $filename = 'dosen_' . Str::random(40) . '.webp';
        $path = 'uploads/' . $filename; 

        $manager = new ImageManager(new Driver());
        $img = $manager->read($this->picture->getRealPath());
        
        $img->scaleDown(width: 1200);
        $encodedImage = $img->toWebp(quality: 75);

        Storage::disk('public')->put($path, $encodedImage->toString());

        Lecturer::create([
            'name' => $this->name,
            'position' => $this->position,
            'program' => $this->program,
            'description' => $this->description,
            'picture' => $path
        ]);

        $this->picture->delete();
        $this->reset('picture');

        session()->flash('success', 'Data Dosen Berhasil Dibuat!');
        return redirect()->to('/lecturers');
    }

    public function render()
    {
        return view('livewire.admin.admin-lecturer-post');
    }
}
