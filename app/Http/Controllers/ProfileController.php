<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()  {
        $profile = Profile::where('id', '1')->first();
        return view('public.tentangKami', ['profile' => $profile]);
    }
}
