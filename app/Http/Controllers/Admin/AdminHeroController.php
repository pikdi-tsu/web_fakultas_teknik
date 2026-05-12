<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminHeroController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminHero');
    }

    public function create()
    {
        return view('admin.form.heroPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:16000',
            'title' => 'required',
            'description' => 'required'
        ]);
    
        $file = $request->file('image');
    
        $filename = 'hero_' . Str::random(40) . '.webp';
        $path = 'uploads/' . $filename;

        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());

        $image->scaleDown(width: 1200);

        $encodedImage = $image->toWebp(quality: 90);

        Storage::disk('public')->put($path, $encodedImage->toString());

        Hero::create([
            'image' => $path,
            'title' => $validated['title'],
            'description' => $validated['description']
        ]);

        return redirect('/heroes')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Hero $hero)  {
        return view('admin.form.heroEdit', ['hero' => $hero]);
    }

    public function update(Request $request, Hero $hero)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:16000',
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }
        
            $file = $request->file('image');
        
            $filename = 'hero_' . Str::random(40) . '.webp';
            $path = 'uploads/' . $filename;
            
            $manager = new ImageManager(new Driver());

            $image = $manager->read($file->getRealPath());

            $image->scaleDown(width: 1200);

            $encodedImage = $image->toWebp(quality: 90);

            Storage::disk('public')->put($path, $encodedImage->toString());

            $hero->update([
                'image' => $path,
                'title' => $validated['title'],
                'description' => $validated['description']
            ]);
        } else {
            $hero->update([
                'title' => $validated['title'],
                'description' => $validated['description']
            ]);
        }

        return redirect('/heroes')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Hero $hero)
    {
        if ($hero->image && Storage::disk('public')->exists($hero->image)) {
            Storage::disk('public')->delete($hero->image);
        }

        $hero->delete();    

        return redirect('/heroes')->with('success', 'Data Berhasil Dihapus!');
    }
}
