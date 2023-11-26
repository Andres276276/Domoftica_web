<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
  
    
     public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
    
        $remember = ($request->has('remember') ? true : false);
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
    
            $user = auth()->user();
    
            if (Auth::attempt($credentials)) {
                return redirect()->route('privada')->with('success', 'Inicio de sesión exitoso');
           
            }
        }
        
        return redirect()->route('home')
        ->withErrors(['error' => 'Credenciales incorrectas. Vuelve a intentarlo.']);   
     }


    public function registrarUsuario(Request $request)
    {

        $response = Http::post('https://web-domoftware-production.up.railway.app/api/users', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            // Inicia sesión automáticamente con el usuario recién registrado
            Auth::loginUsingId($response->json('data.id'));

        
            return redirect()->route('privada');
        } else {
            // Manejar errores, por ejemplo, mostrar un mensaje de error
            return back()->withErrors(['error' => 'Error al registrar usuario']);
        }
    }









     
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }





}
