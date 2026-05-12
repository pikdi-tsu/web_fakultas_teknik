<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ldedication;
use App\Models\Lecturer;
use App\Models\Lintelectual;
use App\Models\Lpublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class AdminLectureController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminDaftarDosen');
    }

    public function create()
    {
        return view('admin.form.dosenPost');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Lecturer $lecturer)  {
        return view('admin.form.dosenEdit', ['lecturer' => $lecturer]);
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    public function destroy(Lecturer $lecturer)
    {
        if ($lecturer->picture && Storage::disk('public')->exists($lecturer->picture)) {
            Storage::disk('public')->delete($lecturer->picture);
        }

        $lecturer->delete();

        return redirect('/lecturers')->with('success', 'Data Berhasil Dihapus!');
    }

    // -------------------------------------------------------------------------------------
    public function selectJournal(Lecturer $lecturer){
        $lpublication = Lpublication::where('lecturer_id', $lecturer->id)->get();
        $ldedication = Ldedication::where('lecturer_id', $lecturer->id)->get();
        $lintelectual = Lintelectual::where('lecturer_id', $lecturer->id)->get();

        return view('admin.adminJurnalDosen', ['lecturer' => $lecturer, 'lpublications' => $lpublication, 'ldedications' => $ldedication, 'lintelectuals' => $lintelectual]);
    }

    // Publication--------------------------------------------------------------------------
    public function createPublication(Lecturer $lecturer)
    {
        return view('admin.form.dosenPublikasiPost', ['lecturer' => $lecturer]);
    }

    public function storePublication(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'lecturer_id' => 'required'
        ]);

        Lpublication::create($validated);

        return redirect()->route('jurnalDosen', ['lecturer' => $lecturer->id])->with('success', 'Data Berhasil Dibuat!');
    }

    public function editPublication(Lpublication $lpublication)  {
        return view('admin.form.dosenPublikasiEdit', ['lpublication' => $lpublication]);
    }

    public function updatePublication(Request $request, Lpublication $lpublication)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'lecturer_id' => 'required'
        ]);
    
        $lpublication->update($validated);

        return redirect()->route('jurnalDosen', ['lecturer' => $lpublication->lecturer_id])->with('success', 'Data Berhasil Di-update!');
    }
    
    public function destroyPublication(Lpublication $lpublication)
    {
        $lpublication->delete();
        return redirect()->route('jurnalDosen', ['lecturer' => $lpublication->lecturer_id])->with('success', 'Data Berhasil Dihapus!');
    }

    // Dedication---------------------------------------------------------------------------
    public function createDedication(Lecturer $lecturer)
    {
        return view('admin.form.dosenPengabdianPost', ['lecturer' => $lecturer]);
    }

    public function storeDedication(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'lecturer_id' => 'required'
        ]);

        Ldedication::create($validated);

        return redirect()->route('jurnalDosen', ['lecturer' => $lecturer->id])->with('success', 'Data Berhasil Dibuat!');
    }

    public function editDedication(Ldedication $ldedication)  {
        return view('admin.form.dosenPengabdianEdit', ['ldedication' => $ldedication]);
    }

    public function updateDedication(Request $request, Ldedication $ldedication)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'lecturer_id' => 'required'
        ]);
    
        $ldedication->update($validated);

        return redirect()->route('jurnalDosen', ['lecturer' => $ldedication->lecturer_id])->with('success', 'Data Berhasil Di-update!');
    }
    
    public function destroyDedication(Ldedication $ldedication)
    {
        $ldedication->delete();
        return redirect()->route('jurnalDosen', ['lecturer' => $ldedication->lecturer_id])->with('success', 'Data Berhasil Dihapus!');
    }

    // Intelectual--------------------------------------------------------------------------
    public function createIntelectual(Lecturer $lecturer)
    {
        return view('admin.form.dosenKIntelektualPost', ['lecturer' => $lecturer]);
    }

    public function storeIntelectual(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'lecturer_id' => 'required'
        ]);

        Lintelectual::create($validated);

        return redirect()->route('jurnalDosen', ['lecturer' => $lecturer->id])->with('success', 'Data Berhasil Dibuat!');
    }

    public function editIntelectual(Lintelectual $lintelectual)  {
        return view('admin.form.dosenKIntelektualEdit', ['lintelectual' => $lintelectual]);
    }

    public function updateIntelectual(Request $request, Lintelectual $lintelectual)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'lecturer_id' => 'required'
        ]);
    
        $lintelectual->update($validated);

        return redirect()->route('jurnalDosen', ['lecturer' => $lintelectual->lecturer_id])->with('success', 'Data Berhasil Di-update!');
    }
    
    public function destroyIntelectual(Lintelectual $lintelectual)
    {
        $lintelectual->delete();
        return redirect()->route('jurnalDosen', ['lecturer' => $lintelectual->lecturer_id])->with('success', 'Data Berhasil Dihapus!');
    }
}
