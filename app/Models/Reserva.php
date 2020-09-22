<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'RESERVAS';
    protected $fillable=['MESA', 'FECHA_RESERVA', 'NOMBRE_RESERVA', 'RESTAURANTES_ID_RESTAURANTE'];
    public $timestamps = false;

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class,'ID_RESTAURANTE');
    }
}
