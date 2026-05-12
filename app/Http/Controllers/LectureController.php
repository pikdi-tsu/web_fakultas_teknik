<?php

namespace App\Http\Controllers;

use App\Models\Ldedication;
use App\Models\Lecturer;
use App\Models\Lintelectual;
use App\Models\Lpublication;

class LectureController extends Controller
{
    public function index()  {
        return view('public.daftarDosen');
    }
    public function select(Lecturer $lecturer)  {
        $lpublication = Lpublication::where('lecturer_id', $lecturer->id)->get();
        $ldedication = Ldedication::where('lecturer_id', $lecturer->id)->get();
        $lintelectual = Lintelectual::where('lecturer_id', $lecturer->id)->get();

        return view('public.daftarDosenSelect', ['lecturer' => $lecturer, 'lpublications' => $lpublication, 'ldedications' => $ldedication, 'lintelectuals' => $lintelectual]);
    }
}


