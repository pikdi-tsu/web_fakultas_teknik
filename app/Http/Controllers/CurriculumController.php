<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Study;

class CurriculumController extends Controller
{
    public function select(Study $study)  {
        $curriculum = Curriculum::where('study_id', $study->id)->first();
        return view('public.studiKurikulum', ['study' => $study, 'curriculum' => $curriculum]);
    }
}
