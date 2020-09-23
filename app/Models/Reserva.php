<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable=['numero_mesa', 'fecha_reserva', 'cliente', 'id_restaurante'];
    public $timestamps = false;

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class,'id_restaurante');
    }
}
