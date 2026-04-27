<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function index()
{
    $user = Auth::user();

    return view('admin_dashboard.profil.index', compact('user'));
}

  public function edit()
    {
        $user = Auth::user();
        return view('admin_dashboard.profil.edit', compact('user'));
    }

 public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diupdate');
    }

}