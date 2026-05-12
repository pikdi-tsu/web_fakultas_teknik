<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()  {
        $hero = Hero::all();
        return view('public.welcome', ['heroes' => $hero]);
    }
}
