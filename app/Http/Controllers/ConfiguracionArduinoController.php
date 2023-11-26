<?php

// app/Http/Controllers/ConfiguracionArduinoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfiguracionArduino;

class ConfiguracionArduinoController extends Controller
{
    public function formulario()
    {
        $configuracion = ConfiguracionArduino::first(); // Obtén la primera configuración existente

        return view('configuracion-arduino.ardcong', compact('configuracion'));
    }

    public function guardar(Request $request)
    {
        $data = $request->validate([
            'Tipo_Arduino' => 'required',
            'Configuracion_Luces' => 'required|array',
            'Intervalo_Lectura_Sensores' => 'required|integer',
            'Intervalo_Riego' => 'required|integer',
            'Configuracion_Alarma' => 'nullable|array',
        ]);

        $configuracion = ConfiguracionArduino::first();

        if ($configuracion) {
            // Si existe una configuración, actualiza los datos
            $configuracion->update($data);
        } else {
            // Si no existe una configuración, crea una nueva
            ConfiguracionArduino::create($data);
        }

        return redirect ('http://localhost/Domoftware/public/formulario');
    }
}

    