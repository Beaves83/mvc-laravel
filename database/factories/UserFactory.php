<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Role;

$factory->define(App\User::class, function (Faker $faker) {
    
    //$arrayValues = ['admin', 'secretario', 'medico'];
    //$role = Role::all()->random();
    
    return [
        'name' => $faker->name,
        //'rol' => ''.$role->description.'', //Abría que cambiarlo por el número.
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
