<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminProjectController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminProyek');
    }

    public function create()
    {
        return view('admin.form.proyekPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'created_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        $htmlContent = $validated['description'];

        preg_match_all('/uploads\/temp\/([a-zA-Z0-9_-]+\.webp)/', $htmlContent, $matches);
        $filenames = array_unique($matches[1] ?? []);

        foreach ($filenames as $filename) {
            $tempPath = 'uploads/temp/' . $filename;
            $permanentPath = 'uploads/inline_images/' . $filename;

            if (Storage::disk('public')->exists($tempPath)) {
                Storage::disk('public')->move($tempPath, $permanentPath);
            }
        }

        $htmlContent = str_replace('uploads/temp/', 'uploads/inline_images/', $htmlContent);

        $validated['description'] = $htmlContent;

        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $filename = 'proyek_' . Str::random(40) . '.webp';
            $path = 'uploads/' . $filename;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getRealPath());
            $image->scaleDown(width: 1200);
            $encodedImage = $image->toWebp(quality: 85);

            Storage::disk('public')->put($path, $encodedImage->toString());

            Project::create([
                'title' => $validated['title'],
                'description' => $validated['description'], 
                'created_at' => $validated['created_at'] ?? now(),
                'image' => $path
            ]);

        } else {
            
            Project::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'created_at' => $validated['created_at'] ?? now(),
            ]);

        }

        return redirect('/projects')->with('success', 'Data Berhasil Dibuat!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Project $project)
    {
        return view('admin.form.proyekEdit', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'created_at' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:16000'
        ]);

        preg_match_all('/uploads\/inline_images\/([a-zA-Z0-9_-]+\.webp)/', $project->description, $oldMatches);
        $oldImages = array_unique($oldMatches[1] ?? []);

        preg_match_all('/uploads\/(?:inline_images|temp)\/([a-zA-Z0-9_-]+\.webp)/', $validated['description'], $newMatches);
        $newImages = array_unique($newMatches[1] ?? []);

        $deletedImages = array_diff($oldImages, $newImages);

        foreach ($deletedImages as $deletedImage) {
            $pathToDelete = 'uploads/inline_images/' . $deletedImage;
            if (Storage::disk('public')->exists($pathToDelete)) {
                Storage::disk('public')->delete($pathToDelete);
            }
        }
        
        $htmlContent = $validated['description'];

        preg_match_all('/uploads\/temp\/([a-zA-Z0-9_-]+\.webp)/', $htmlContent, $matches);
        $filenames = array_unique($matches[1] ?? []);

        foreach ($filenames as $filename) {
            $tempPath = 'uploads/temp/' . $filename;
            $permanentPath = 'uploads/inline_images/' . $filename;

            if (Storage::disk('public')->exists($tempPath)) {
                Storage::disk('public')->move($tempPath, $permanentPath);
            }
        }

        $htmlContent = str_replace('uploads/temp/', 'uploads/inline_images/', $htmlContent);
        $validated['description'] = $htmlContent;

        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }

            $file = $request->file('image');
            $filename = 'proyek_' . Str::random(40) . '.webp';
            $path = 'uploads/' . $filename;
            
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file->getRealPath());
            $image->scaleDown(width: 1200);
            $encodedImage = $image->toWebp(quality: 85);

            Storage::disk('public')->put($path, $encodedImage->toString());

            $project->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'created_at' => $validated['created_at'] ?? $project->created_at,
                'image' => $path
            ]);
        } else {
            $project->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'created_at' => $validated['created_at'] ?? $project->created_at
            ]);
        }

        return redirect('/projects')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Project $project)
    {
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        if ($project->description) {
            $dom = new \DOMDocument();
            
            @$dom->loadHTML($project->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            
            $images = $dom->getElementsByTagName('img');
            
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                
                if (strpos($src, 'storage/') !== false) {
                    $path = explode('storage/', $src)[1];
                    
                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
        }

        $project->delete();

        return redirect('/projects')->with('success', 'Data Berhasil Dihapus!');
    }
}
