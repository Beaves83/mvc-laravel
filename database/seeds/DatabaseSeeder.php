<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {      
        factory(App\Cliente::class, 500)->create();
        factory(App\Cita::class, 3000)->create();
        factory(App\User::class, 300)->create();
    }
}
