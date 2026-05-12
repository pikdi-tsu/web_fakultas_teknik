<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminPublicationController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminPublikasiMhs');
    }

    public function create()
    {
        return view('admin.form.publikasiPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'team' => 'required',
            'link' => 'required',
            'year' => 'required',
            'abstraction' => 'required',
        ]);

        Publication::create($validated);

        return redirect('/publications')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Publication $publication)  {
        return view('admin.form.publikasiEdit', ['publication' => $publication]);
    }

    public function update(Request $request, Publication $publication)
    {
        $validated = $request->validate([
            'title' => 'required',
            'team' => 'required',
            'link' => 'required',
            'year' => 'required',
            'abstraction' => 'required',
        ]);
    
        $publication->update($validated);
    
        return redirect('/publications')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();

        return redirect('/publications')->with('success', 'Data Berhasil Dihapus!');
    }
}
