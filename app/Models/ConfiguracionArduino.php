<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionArduino extends Model
{

    
    use HasFactory;
    protected $table = 'confi_arduinos';


    protected $fillable = [
        'Tipo_Arduino',
        'Configuracion_Luces',
        'Intervalo_Lectura_Sensores',
        'Intervalo_Riego',
        'Configuracion_Alarma',
    ];

    protected $casts = [
        'Configuracion_Luces' => 'array',
        'Configuracion_Alarma' => 'array',
    ];
}
