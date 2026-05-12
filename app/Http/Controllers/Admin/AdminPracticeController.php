<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminPracticeController extends Controller
{
    use WithPagination;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.adminJadwalPraktek');
    }

    public function create()
    {
        return view('admin.form.praktekPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'title' => 'required',
            'supervisor' => 'required',
            'date' => 'required',
            'room' => 'required'
        ]);

        Practice::create($validated);

        return redirect('practices')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Practice $practice)
    {
        return view('admin.form.praktekEdit', ['practice' => $practice]);
    }

    public function update(Request $request, Practice $practice)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'title' => 'required',
            'supervisor' => 'required',
            'date' => 'required',
            'room' => 'required'
        ]);
    
        $practice->update($validated);
    
        return redirect('practices')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Practice $practice)
    {
        $practice->delete();

        return redirect('practices')->with('success', 'Data Berhasil Dihapus!');
    }
}
