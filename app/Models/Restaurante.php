<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table = 'RESTAURANTES';
    protected $fillable=['NOMBRE', 'DESCRIPCION', 'CIUDAD', 'URL_FOTO', 'CANTIDAD_MESAS'];
    public $timestamps = false;

    public function reserva()
    {
        return $this->hasMany(Reserva::class,'ID_RESTAURANTE');
    }
}