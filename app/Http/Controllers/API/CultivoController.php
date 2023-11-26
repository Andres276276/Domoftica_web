<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cultivo;

class CultivoController extends Controller
{

    //TRAER DATOS
    /**
     * Muestra una lista de todos los cultivos.
     *
     * @return \Illuminate\Http\Response
     */
    public function traertodos()
    {
        $cultivos = Cultivo::all();

        return response()->json($cultivos);
    }

    /**
     * Muestra un cultivo específico por su ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscarporid($id)
    {
        $cultivo = Cultivo::find($id);

        if (!$cultivo) {
            return response()->json(['error' => 'Cultivo no encontrado'], 404);
        }

        return response()->json($cultivo);
    }

    /**
     * Almacena un nuevo cultivo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registrar(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|unique:cultivos',
                'descripcion' => 'nullable',
                'nivel_humedad_optimo' => 'required|integer',
                'tipo_plantas' => 'nullable',
                'fecha_siembra' => 'nullable|date',
            ]);
    
            $cultivo = Cultivo::create($request->all());
    
            return response()->json(['message' => 'Cultivo registrado correctamente', 'cultivo' => $cultivo], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al registrar el cultivo', 'message' => $e->getMessage()], 500);
        }
    }
    

    // EDITAR 
    public function editar(Request $request, $id)
    {
        // Validar la solicitud
        $this->validate($request, [
            'nombre' => 'required|unique:cultivos,nombre,' . $id,
            'descripcion' => 'nullable',
            'nivel_humedad_optimo' => 'required|integer',
            'tipo_plantas' => 'nullable',
            'fecha_siembra' => 'nullable|date',
        ]);

        $cultivo = Cultivo::find($id);

        if (!$cultivo) {
            return response()->json(['error' => 'Cultivo no encontrado'], 404);
        }

        // Actualizar los datos
        $cultivo->nombre = $request->input('nombre');
        $cultivo->descripcion = $request->input('descripcion');
        $cultivo->nivel_humedad_optimo = $request->input('nivel_humedad_optimo');
        $cultivo->tipo_plantas = $request->input('tipo_plantas');
        $cultivo->fecha_siembra = $request->input('fecha_siembra');
        $cultivo->save();

        return response()->json(['message' => 'Cultivo actualizado correctamente', 'cultivo' => $cultivo]);
    }




    //ELIMINAR POR ID
    public function eliminar($id)
    {
        $cultivo = Cultivo::find($id);

        if (!$cultivo) {
            return response()->json(['error' => 'Cultivo no encontrado'], 404);
        }

        $cultivo->delete();

        return response()->json(['message' => 'Cultivo eliminado correctamente']);
    }





}