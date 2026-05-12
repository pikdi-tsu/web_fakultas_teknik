<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Study;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.adminHome');
    }

    public function setting()
    {
        return view('admin.adminPengaturan');
    }

    public function profil()
    {
        $profile = Profile::where('id', '1')->first();
        return view('admin.adminProfil', ['profile' => $profile]);
    }

    public function profilUpdate(Request $request, Profile $profile): RedirectResponse
    {
        $validated = $request->validate([
            'shortInfo' => 'required',
            'profileInformation' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'tujuan' => 'required',
            'sasaran' => 'required',
            'strategi' => 'required',
        ]);
    
        $profile->update($validated);
    
        return redirect('/adminProfil')->with('success', 'Data Berhasil Di update!');
    }

    public function select(Study $study)  {
        return view('admin.adminStudi', ['study' => $study]);
    }

    public function studiUpdate(Request $request, Study $study): RedirectResponse
    {
        $validated = $request->validate([
            'purpose' => 'required',
            'focus' => 'required',
            'focusDescription' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'excellence' => 'required',
            'graduate' => 'required'
        ]);

        $study->update($validated); 

        return redirect()->back()->with('success', 'Data Berhasil Di update!');
    }
}
