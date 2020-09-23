<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table = 'restaurantes';
    protected $fillable=['nombre', 'descripcion', 'ciudad', 'foto', 'cantidad_mesas'];
    public $timestamps = false;

    public function reserva()
    {
        return $this->hasMany(Reserva::class,'id_restaurante');
    }
}
