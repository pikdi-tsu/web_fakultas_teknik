<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thesis;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminThesisController extends Controller
{
    use WithPagination;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.adminJadwalSkripsi');
    }

    public function create()
    {
        return view('admin.form.skripsiPost');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'title' => 'required',
            'supervisor' => 'required',
            'date' => 'required|date',
            'room' => 'required'
        ]);

        Thesis::create($validated);

        return redirect('theses')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Thesis $thesis)
    {
        return view('admin.form.skripsiEdit', ['thesis' => $thesis]);
    }

    public function update(Request $request, Thesis $thesis)
    {
        $validated = $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'title' => 'required',
            'supervisor' => 'required',
            'date' => 'required|date',
            'room' => 'required'
        ]);
    
        $thesis->update($validated);
    
        return redirect('theses')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Thesis $thesis)
    {
        $thesis->delete();

        return redirect('theses')->with('success', 'Data Berhasil Dihapus!');
    }
}
