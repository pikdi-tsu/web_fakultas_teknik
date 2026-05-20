<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexPassword()
    {
        $au = Auth::user();
        $user = User::where('id', $au->id)->first();
        return view('admin.adminUserPassword', ['user' => $user]);
    }
    public function updatePassword(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user->update($validated);

        return redirect('/adminPengaturan')->with('success', 'User Berhasil Di-update!');
    }

    public function indexEmail()
    {
        $au = Auth::user();
        $user = User::where('id', $au->id)->first();
        return view('admin.adminUserEmail', ['user' => $user]);
    }
    public function updateEmail(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'current_password' => ['required', 'current_password']
        ]);

        $user->update($validated);

        return redirect('/adminPengaturan')->with('success', 'User Berhasil Di-update!');
    }
}
