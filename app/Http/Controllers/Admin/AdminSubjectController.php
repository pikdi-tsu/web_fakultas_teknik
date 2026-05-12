<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Study;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($study_id)
    {
        $study = Study::where('id', $study_id)->first();
        return view('admin.adminMakul', ['study' => $study]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($study_id)
    {
        return view('admin.form.makulPost', ['study_id' => $study_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $study_id)
    {
        $validated = $request->validate([
            'semester' => 'required',
            'name' => 'required',
            'description' => 'required',
            'credit' => 'required',
            'study_id' => 'required'
        ]);

        Subject::create($validated);

        return redirect()->route('studies.subjects.index', ['study' => $study_id])->with('success', 'Data Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($study_id, Subject $subject)
    {
        return view('admin.form.makulEdit', ['subject' => $subject, 'study_id' => $study_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $study_id, Subject $subject)
    {
        $validated = $request->validate([
            'semester' => 'required',
            'name' => 'required',
            'description' => 'required',
            'credit' => 'required',
            'study_id' => 'required'
        ]);
    
        $subject->update($validated);

        return redirect()->route('studies.subjects.index', ['study' => $study_id])->with('success', 'Data Berhasil Di-update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($study_id, Subject $subject)
    {
        $subject->delete();

        return redirect()->route('studies.subjects.index', ['study' => $study_id])->with('success', 'Data Berhasil Dihapus!');
    }
}
