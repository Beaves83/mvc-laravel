<?php

use Faker\Generator as Faker;
use App\Model;
use App\Cliente;
use App\Cita;

$factory->define(\App\Cita::class, function (Faker $faker) {
    $clienteAleatorio = Cliente::all()->random();
    
    return [
        'cliente_id' =>  $clienteAleatorio->id,
        'fecha' => $faker->dateTimeBetween(),
        'numeroempleadosreservados' => $faker->numberBetween(1,$clienteAleatorio->NumeroReconocimientosContratados),
        'numeroempleadosasistentes' => $faker->numberBetween(0,$clienteAleatorio->NumeroReconocimientosContratados)
    ];
});
