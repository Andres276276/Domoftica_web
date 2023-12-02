<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TablaSensor;

class SensorController extends Controller
{

    //Mostrar todos los registros de los sensores
    public function M_Datos()
    {
        $sensorData = TablaSensor::all();

        return response()->json($sensorData);

    }

    //Eliminar todos los registros 
    public function EliminarTodo()
    {
        TablaSensor::truncate();

        return response()->json(['message' => 'Todos los registros eliminados correctamente']);
    }

//Ver la lectura mas reciente
    public function ultimalectura()
{
    try {
        $latestReading = TablaSensor::latest('id')->first(); // Obtén el registro más reciente según la ID
        if ($latestReading) {
            return response()->json(['data' => $latestReading]);
        } else {
            return response()->json(['message' => 'No hay lecturas disponibles.']);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al obtener la última lectura: ' . $e->getMessage()], 500);
    }
}



}
