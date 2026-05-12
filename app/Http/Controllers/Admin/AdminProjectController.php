<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Livewire\WithPagination;

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
            'link' => 'nullable',
            'description' => 'required'
        ]);

        Project::create($validated);

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
            'link' => 'nullable',
            'description' => 'required'
        ]);
    
        $project->update($validated);
    
        return redirect('/projects')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects')->with('success', 'Data Berhasil Dihapus!');
    }
}
