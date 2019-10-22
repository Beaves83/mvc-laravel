<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model {

    protected $table = 'municipios';
    protected $fillable = [
        'id', 'state_id', 'region_id', 'city_name'
    ];
}
