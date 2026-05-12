<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Information;
use App\Models\Partner;
use App\Models\Testimony;

class BerandaController extends Controller
{
    public function index()  {
        $hero = Hero::all();
        $testimony = Testimony::orderBy('created_at', 'desc')->get();
        $partner = Partner::all();
        $terkini = Information::where('category_id', '!=', '5')->orderBy('created_at', 'desc')->limit(4)->get();
        $artikel = Information::where('category_id', '5')->orderBy('created_at', 'desc')->limit(4)->get();
        return view('public.welcome', [
            'terkinis' => $terkini,
            'artikels' => $artikel,
            'testimonies' => $testimony,
            'heroes' => $hero,
            'partners' => $partner
        ]);
    }
}
