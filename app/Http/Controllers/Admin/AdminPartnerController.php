<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminPartnerController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminMitra');
    }

    public function create()
    {
        return view('admin.form.mitraPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        $file = $request->file('image');
    
        $filename = 'mitra_' . Str::random(40) . '.webp';
        $path = 'uploads/' . $filename;

        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());

        $image->scaleDown(width: 1200);

        $encodedImage = $image->toWebp(quality: 75);

        Storage::disk('public')->put($path, $encodedImage->toString());

        Partner::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $path
        ]);

        return redirect('/partners')->with('success', 'Data Berhasil Dibuat!');
    }

    public function show(Partner $partner)
    {
        //
    }

    public function edit(Partner $partner)
    {
        return view('admin.form.mitraEdit', ['partner' => $partner]);
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        if ($request->hasFile('image')) {
            if ($partner->image && Storage::disk('public')->exists($partner->image)) {
                Storage::disk('public')->delete($partner->image);
            }
    
            $file = $request->file('image');
        
            $filename = 'mitra_' . Str::random(40) . '.webp';
            $path = 'uploads/' . $filename;
            
            $manager = new ImageManager(new Driver());

            $image = $manager->read($file->getRealPath());

            $image->scaleDown(width: 1200);

            $encodedImage = $image->toWebp(quality: 75);

            Storage::disk('public')->put($path, $encodedImage->toString());
    
            $partner->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'image' => $path
            ]);
        }else{
            $partner->update([
                'name' => $validated['name'],
                'description' => $validated['description']
            ]);
        }

        
        return redirect('/partners')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->image && Storage::disk('public')->exists($partner->image)) {
            Storage::disk('public')->delete($partner->image);
        }

        $partner->delete();

        return redirect('/partners')->with('success', 'Data Berhasil Dihapus!');
    }
}
