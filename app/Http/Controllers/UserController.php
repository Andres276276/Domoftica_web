<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cargo; 
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    
    public function updateRelayState(Request $request) {
        $user = Auth::user(); 
    
        if ($request->input('toggle') == 'on') {
            $user->relay_state = 1;
        } else {
            $user->relay_state = 0;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Estado del relé actualizado correctamente');
    }



    public function index()
    {
        try {
            // Realizar la solicitud GET a la API
            $response = Http::get('https://web-domoftware-production.up.railway.app/api/users');
    
            // Verificar si la solicitud fue exitosa (código de estado 2xx)
            if ($response->successful()) {
                // Obtener los datos de la respuesta en formato JSON
                $users = $response->json()['users'];
    
                // Pasar los datos a la vista 'privada_admin'
                return view('privada_admin', compact('users'));
            } else {
                // Manejar errores, por ejemplo, mostrar un mensaje de error
                return view('privada_admin', ['mensaje' => 'Error al obtener datos de la API']);
            }
        } catch (\Exception $e) {
            // Manejar excepciones, por ejemplo, mostrar un mensaje de error
            return view('privada_admin', ['mensaje' => $e->getMessage()]);
        }
    }
    


    public function create()
    {
        $cargos = Cargo::all();
        return view('users.create', compact('cargos'));
    }




 

//Falta editar con apii



//ADMINISTRADOR REGISTRAR USUARIOS
    /**
     * 
     *
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\RedirectResponse
*/
public function store(Request $request)
{
   try {
       $response = Http::post('https://web-domoftware-production.up.railway.app/api/usersad', $request->all());

       if ($response->successful()) {

        return redirect()->route('privada_admin')->with('success', 'Usuario creado exitosamente');
       } else {

        return redirect()->route('privada_admin')->with('error', 'Error al crear el usuario a través de la API');
       }
   } catch (\Exception $e) {

    return redirect()->route('privada_admin')->with('error', $e->getMessage());
   }
} 









        
   

    public function destroy($id)
    {
        try {
            $response = Http::delete("https://web-domoftware-production.up.railway.app/api/users/{$id}");

            if ($response->successful()) {
                return redirect()->route('privada_admin')->with('success', 'Usuario eliminado exitosamente');
            } else {
                // Manejar errores, por ejemplo, mostrar un mensaje de error
                return back()->with('privada_admin', 'Error al eliminar el usuario desde la API');
            }
        } catch (\Exception $e) {
            // Manejar excepciones, por ejemplo, mostrar un mensaje de error
            return back()->with('privada_admin', $e->getMessage());
        }
    }



}
