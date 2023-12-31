<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UserController extends Controller
{

//MOSTRAR USUARIOS
    public function traertodos()
    {
        $users = User::all();
        
        return response()->json(['users' => $users]);
    }

//BUSCAR POR ID
    public function buscarporid($id)
{
    try {
        $usuario = User::findOrFail($id); // Encuentra al usuario por su ID

        return response()->json(['message' => 'Usuario encontrado correctamente', 'usuario' => $usuario], 200);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Usuario no encontrado', 'message' => $e->getMessage()], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al obtener el usuario', 'message' => $e->getMessage()], 500);
    }
}



//LOGIN
public function login(Request $request)
{
    // Validar
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Las credenciales proporcionadas son incorrectas.'],
        ]);
    }

    $user->tokens()->delete();

    $token = $user->createToken('authToken-' . $user->id)->plainTextToken;

    return response()->json(['message' => 'Inicio de sesión exitoso', 'token' => $token, 'user' => $user]);
}

//LOGOUT
public function logout(Request $request)
{
    if ($request->user()) {
        $request->user()->token()->revoke();
    }

    return response()->json(['message' => '¡Sesión cerrada correctamente!']);
}


//REGISTRO ADMIN
     public function registroad(Request $request)
    {
        // Valid
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8', 
            'id_cargo' => 'required|in:1,2',

        ]);
    
        // Crear nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_cargo = $request->id_cargo;
    
        $user->save();
    
        return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
    }


//REGISTRO COMO USUARIO
    public function registro(Request $request)
    {
        // Validar los datos users 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8', 
        ]);
    
        // Crear nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
    
        $user->id_cargo = 2;
    
        $user->save();
    
        return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
    }
    

//ACTUALIZAR USUARIO
    public function update(Request $request)
    {
        try {
            $user = Auth::user();

            $this->validate($request, [
                'name' => 'string',
                'email' => 'email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:6',
                'id_cargo' => 'integer',
            ]);

            $user->fill($request->only(['name', 'email', 'password', 'id_cargo']));

            $user->save();

            return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


//ELIMINAR USUARIOS POR ID 
    public function eliminar($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado con éxito']);
    }

    //ELIMINAR CUENTA DESDE PROPIA
    public function eliminarCuentapropia(Request $request)
    {
        $usuario = Auth::user();

        try {
            $usuario->delete();

            return response()->json(['message' => 'Cuenta eliminada correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la cuenta', 'message' => $e->getMessage()], 500);
        }
    }


    //EDITAR USUARIO POR ID
    public function editarUsuarioPorId(Request $request, $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->update($request->all());

            return response()->json(['message' => 'Usuario actualizado correctamente', 'usuario' => $usuario]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuario no encontrado', 'message' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el usuario', 'message' => $e->getMessage()], 500);
        }
    }







//VER PERFIL
 public function getProfile(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }


//ACTUALIZAR PERFIL
public function updateProfile(Request $request)
{
    $user = $request->user();

    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6', 
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return response()->json([
        'message' => 'Perfil actualizado con éxito',
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ],
    ]);
}



    
} 
