<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminAssignmentController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminTugasAkhirMhs');
    }

    public function create()
    {
        return view('admin.form.tugasAkhirPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'program' => 'required',
            'year' => 'required',
            'abstraction' => 'required',
        ]);

        Assignment::create($validated);

        return redirect('/assignments')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Assignment $assignment)  {
        return view('admin.form.tugasAkhirEdit', ['assignment' => $assignment]);
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'program' => 'required',
            'year' => 'required',
            'abstraction' => 'required',
        ]);
    
        $assignment->update($validated);
    
        return redirect('/assignments')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect('/assignments')->with('success', 'Data Berhasil Dihapus!');
    }
}
