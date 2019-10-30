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
        //Poblados los datos necesarios para los formularios
        $this->call('PaisesSeeder');
        $this->call('ComunidadesAutonomasSeeder');
        $this->call('ProvinciasSeeder');
        $this->call('MunicipiosSeeder');
        $this->call(RoleTableSeeder::class);
        $this->call(UserTestsSeeder::class);
           
        //Rellenamos la BBDD con valores.
        factory(App\Cliente::class, 10)->create();
        factory(App\Cita::class, 10)->create();
        //factory(App\User::class, 100)->create();
    }
}
