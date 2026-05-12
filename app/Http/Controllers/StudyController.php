<?php

namespace App\Http\Controllers;

use App\Models\Study;

class StudyController extends Controller
{
    public function informatika()  {
        $study = Study::where('id', '1')->first();
        return view('public.studi', ['study' => $study]);
    }
    public function sistemInformasi()  {
        $study = Study::where('id', '2')->first();
        return view('public.studi', ['study' => $study]);
    }
    public function rekayasaKomputer()  {
        $study = Study::where('id', '3')->first();
        return view('public.studi', ['study' => $study]);
    }
}
