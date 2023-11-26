<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaSensor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'tabla_sensor';

   
public function temperatura()
{
    return $this->hasOne(Temperatura::class);
}

public function humedad()
{
    return $this->hasOne(HumedadAmbiente::class);
}

public function flujoAgua()
{
    return $this->hasOne(FlujoAgua::class);
}

public function estadoTierra()
{
    return $this->hasOne(EstadoTierra::class);
}


}

class EstadoTierra extends Model
{
    public function controlRiego()
    {
        return $this->hasOne(ControlRiego::class);
    }

}



