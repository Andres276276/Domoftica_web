<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TablaSensor;
use App\Models\Sensor;
use App\Models\Cultivo;




class SensorController extends Controller
{

    public function index() {
        $datos = Sensor::all();
        $cultivos = Cultivo::all();

    
        $ultimoSensor = Sensor::latest()->first();
    
        return view('sensor.index', ['datos' => $datos, 'ultimoSensor' => $ultimoSensor]);
    }

    public function mostrarDatos(Request $request)
    {
        $registrosPorPagina = 15;
        $paginaActual = $request->input('pagina', 1); 
    
        $totalRegistros = TablaSensor::count();
        $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
        
    
        $datos = TablaSensor::orderBy('id', 'desc')
            ->skip(($paginaActual - 1) * $registrosPorPagina)
            ->take($registrosPorPagina)
            ->get();
    
        return view('arduino', compact('datos', 'paginaActual', 'totalPaginas'));
    }
    

public function mostrarUltimaCaptura() {
    $ultimoSensor = Sensor::max('id');

    if (!$ultimoSensor) {
        return view('sensor.ultima_captura', ['ultimoSensor' => null]);
    }
    $registro = Sensor::find($ultimoSensor);

    return view('sensor.ultima_captura', ['ultimoSensor' => $registro]);
}


public function eliminarRegistros(Request $request) {
    $idsSeleccionados = $request->input('idsSeleccionados');

    try {
        TablaSensor::whereIn('id', $idsSeleccionados)->delete();
        
        return redirect()->back()->with('success', 'Registros seleccionados eliminados correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar los registros seleccionados.');
    }
}


    }



