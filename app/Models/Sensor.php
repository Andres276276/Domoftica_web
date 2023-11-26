<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'tabla_sensor';
    protected $fillable = ['humedad', 'temperatura', 'humedad_suelo', 'flujo_agua', 'fecha_hora'];

}
