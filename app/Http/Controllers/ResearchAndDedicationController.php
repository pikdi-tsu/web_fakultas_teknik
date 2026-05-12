<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Dedication;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Research;

class ResearchAndDedicationController extends Controller
{
    public function riset()  {
        return view('public.risetDosen');
    }
    public function pengabdian()  {
        return view('public.pengabdianDosen');
    }
    public function tugasAkhir()  {
        return view('public.tugasAkhirMhs');
    }
    public function publikasi()  {
        return view('public.publikasiMhs');
    }
    public function proyek()  {
        return view('public.proyekBelajar');
    }

    public function selectRiset(Research $research)  {
        return view('public.risetDosenAbstraksi', ['research' => $research]);
    }
    public function selectPengabdian(Dedication $dedication)  {
        return view('public.pengabdianDosenAbstraksi', ['dedication' => $dedication]);
    }
    public function selectTugasAkhir(Assignment $assignment)  {
        return view('public.tugasAkhirMhsAbstraksi', ['assignment' => $assignment]);
    }
    public function selectPublikasi(Publication $publication)  {
        return view('public.publikasiMhsAbstraksi', ['publication' => $publication]);
    }
    public function selectProyek(Project $project)  {
        return view('public.proyekBelajarDeskripsi', ['project' => $project]);
    }
}
