<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

public function updateLanguage($language)
{
    if (in_array($language, ['es', 'en'])) {
        app()->setLocale($language);
        session()->put('locale', $language);
    }

    return redirect()->back(); 
}


    public function show()
{
    $user = Auth::user();
    return view('profile', compact('user'));
}

public function update(Request $request)
{
    $user = Auth::user(); 

   
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return redirect()->back()->with('success', 'Perfil actualizado exitosamente.');
}


public function  vista(){
    $user = Auth::user();
    return view('perfil_user', compact('user'));
   
}


 }

