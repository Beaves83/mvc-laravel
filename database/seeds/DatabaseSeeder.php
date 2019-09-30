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
        
        factory(App\Cliente::class, 1000)->create();
        factory(App\Cita::class, 30000)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
