<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cpl;
use App\Models\Study;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminCplController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($study_id)
    {
        $study = Study::where('id', $study_id)->first();
        return view('admin.adminCpl', ['study' => $study]);
    }

    public function create($study_id)
    {
        return view('admin.form.cplPost', ['study_id' => $study_id]);
    }

    public function store(Request $request, $study_id)
    {
        $validated = $request->validate([
            'code' => 'required',
            'description' => 'required',
            'study_id' => 'required'
        ]);

        Cpl::create($validated);

        return redirect()->route('studies.cpls.index', ['study' => $study_id])->with('success', 'Data Berhasil Dibuat!');
    }

    public function show(Cpl $cpl)
    {
        return view('admin.adminCpl', ['cpl' => $cpl]);
    }

    public function edit($study_id, Cpl $cpl)
    {
        return view('admin.form.cplEdit', ['cpl' => $cpl, 'study_id' => $study_id]);
    }

    public function update(Request $request, $study_id, Cpl $cpl)
    {
        $validated = $request->validate([
            'code' => 'required',
            'description' => 'required',
            'study_id' => 'required'
        ]);
    
        $cpl->update($validated);
    
        return redirect()->route('studies.cpls.index', ['study' => $study_id])->with('success', 'Data Berhasil Di-update!');
    }

    public function destroy($study_id, Cpl $cpl)
    {
        $cpl->delete();

        return redirect()->route('studies.cpls.index', ['study' => $study_id])->with('success', 'Data Berhasil Dihapus!');
    }
}
