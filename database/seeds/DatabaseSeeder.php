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
        
        factory(App\Cliente::class, 100)->create();
        factory(App\Cita::class, 300)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
