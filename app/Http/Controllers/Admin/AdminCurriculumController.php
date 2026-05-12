<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminCurriculumController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function select(Curriculum $curriculum)  {
        return view('admin.adminKurikulum', ['curriculum' => $curriculum]);
    }

    public function update(Request $request, Curriculum $curriculum)
    {
        $validated = $request->validate([
            'description' => 'required',
        ]);
    
        $curriculum->update($validated); 
    
        return redirect()->back()->with('success', 'Data Berhasil Di-update!');
    }
}
