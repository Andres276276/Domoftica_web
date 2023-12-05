<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TablaSensor;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['humedad', 'temperatura', 'humedad_suelo', 'flujo_agua', 'fecha_hora']);

        TablaSensor::create($data);

        return response()->json(['message' => 'Data stored successfully'], 201);
    }

//lectura ultima web
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
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


        public function M_Datos()
    {
        $sensorData = TablaSensor::all();

        return response()->json([
            'message' => 'Datos obtenidos correctamente',
            'data' => $sensorData,
        ], 200);
    }
    
    
}
