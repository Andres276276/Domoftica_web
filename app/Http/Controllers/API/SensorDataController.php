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
}
