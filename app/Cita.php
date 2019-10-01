<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class Cita extends Model
{
    public function cliente() {
        return $this->belongsTo('App\Cliente','cliente_id');
    }
    
    public function clientes() {
        return $this->belongsToMany('App\Cliente','cliente_id');
    }
    
    public function clientestemporal()
    {
        return $this->hasMany(Cliente::class);
    }
}
