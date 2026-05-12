<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminResearchController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminRiset');
    }

    public function create()
    {
        return view('admin.form.risetPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'team' => 'required',
            'year' => 'required',
            'fund' => 'required',
            'abstraction' => 'required',
        ]);

        Research::create($validated);

        return redirect('/researchs')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Research $research)  {
        return view('admin.form.risetEdit', ['research' => $research]);
    }

    public function update(Request $request, Research $research)
    {
        $validated = $request->validate([
            'title' => 'required',
            'team' => 'required',
            'year' => 'required',
            'fund' => 'required',
            'abstraction' => 'required',
        ]);
    
        $research->update($validated);
    
        return redirect('/researchs')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Research $research)
    {
        $research->delete();

        return redirect('/researchs')->with('success', 'Data Berhasil Dihapus!');
    }
}
