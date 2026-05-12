<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dedication;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminDedicationController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminPengabdian');
    }

    public function create()
    {
        return view('admin.form.pengabdianPost');
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

        Dedication::create($validated);

        return redirect('/dedications')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit(Dedication $dedication)  {
        return view('admin.form.pengabdianEdit', ['dedication' => $dedication]);
    }

    public function update(Request $request, Dedication $dedication)
    {
        $validated = $request->validate([
            'title' => 'required',
            'team' => 'required',
            'year' => 'required',
            'fund' => 'required',
            'abstraction' => 'required',
        ]);
    
        $dedication->update($validated);
    
        return redirect('/dedications')->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy(Dedication $dedication)
    {
        $dedication->delete();

        return redirect('/dedications')->with('success', 'Data Berhasil Dihapus!');
    }
}
