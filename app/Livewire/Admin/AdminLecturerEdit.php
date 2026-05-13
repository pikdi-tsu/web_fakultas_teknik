<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Lecturer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminLecturerEdit extends Component
{
    use WithFileUploads;

    public Lecturer $lecturer;
    public $name;
    public $position;
    public $program;
    public $description;
    public $picture;
    public $existingPicture;

    public function mount(Lecturer $lecturer)
    {
        $this->lecturer = $lecturer;
        $this->name = $lecturer->name;
        $this->position = $lecturer->position;
        $this->program = $lecturer->program;
        $this->description = $lecturer->description;
        $this->existingPicture = $lecturer->picture;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'position' => 'required',
            'program' => 'required',
            'description' => 'nullable',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        if ($this->picture) {
            if ($this->existingPicture && Storage::disk('public')->exists($this->existingPicture)) {
                Storage::disk('public')->delete($this->existingPicture);
            }

            $filename = 'dosen_' . Str::random(40) . '.webp';
            $path = 'uploads/' . $filename;
            
            $manager = new ImageManager(new Driver());
            $img = $manager->read($this->picture->getRealPath());
            $img->scaleDown(width: 1200);
            $encodedImage = $img->toWebp(quality: 85);

            Storage::disk('public')->put($path, $encodedImage->toString());

            $this->lecturer->update([
                'name' => $this->name,
                'position' => $this->position,
                'program' => $this->program,
                'description' => $this->description ?: null,
                'picture' => $path
            ]);

            $this->picture->delete();
            $this->reset('picture');
            
        } else {
            $this->lecturer->update([
                'name' => $this->name,
                'position' => $this->position,
                'program' => $this->program,
                'description' => $this->description ?: null
            ]);
        }


        session()->flash('success', 'Data Berhasil Di-update!');
        return redirect()->to('/lecturers');
    }

    public function render()
    {
        return view('livewire.admin.admin-lecturer-edit');
    }
}
