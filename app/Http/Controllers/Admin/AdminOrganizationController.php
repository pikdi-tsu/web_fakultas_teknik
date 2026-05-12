<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminOrganizationController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminOrganisasi');
    }

    public function create()
    {
        return view('admin.form.organisasiPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'description' => 'required|max:230',
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        $file = $request->file('image');
    
        $filename = 'organisasi_' . Str::random(40) . '.webp';
        $path = 'uploads/' . $filename;

        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());

        $image->scaleDown(width: 1200);

        $encodedImage = $image->toWebp(quality: 75);

        Storage::disk('public')->put($path, $encodedImage->toString());

        Organization::create([
            'title' => $validated['title'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'link' => $validated['link'],
            'image' => $path
        ]);

        return redirect('/organizations')->with('success', 'Data Berhasil Dibuat!');
    }

    public function show(Organization $organization)
    {
        //
    }

    public function edit(Organization $organization)
    {
        return view('admin.form.organisasiEdit', ['organization' => $organization]);
    }

    public function update(Request $request, Organization $organization)
    {
        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'description' => 'required|max:230',
            'link' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        if ($request->hasFile('image')) {
            if ($organization->image && Storage::disk('public')->exists($organization->image)) {
                Storage::disk('public')->delete($organization->image);
            }
    
            $file = $request->file('image');
        
            $filename = 'organisasi_' . Str::random(40) . '.webp';
            $path = 'uploads/' . $filename;
            
            $manager = new ImageManager(new Driver());

            $image = $manager->read($file->getRealPath());

            $image->scaleDown(width: 1200);

            $encodedImage = $image->toWebp(quality: 75);

            Storage::disk('public')->put($path, $encodedImage->toString());
    
            $organization->update([
                'title' => $validated['title'],
                'name' => $validated['name'],
                'description' => $validated['description'],
                'link' => $validated['link'],
                'image' => $path
            ]);
        }else{
            $organization->update([
                'title' => $validated['title'],
                'name' => $validated['name'],
                'description' => $validated['description'],
                'link' => $validated['link']
            ]);
        }

        
        return redirect('/organizations')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Organization $organization)
    {
        if ($organization->image && Storage::disk('public')->exists($organization->image)) {
            Storage::disk('public')->delete($organization->image);
        }

        $organization->delete();

        return redirect('/organizations')->with('success', 'Data Berhasil Dihapus!');
    }
}
