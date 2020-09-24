<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $table = 'restaurantes';
    protected $fillable=['nombre', 'descripcion', 'id_ciudad', 'id_categoria', 'foto', 'cantidad_mesas'];
    public $timestamps = false;

    public function reserva()
    {
        return $this->hasMany(Reserva::class,'id_restaurante');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class,'id_ciudad','id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id_categoria','id');
    }
}
