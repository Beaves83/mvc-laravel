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
        factory(App\Cliente::class, 100)->create();
        factory(App\Cita::class, 500)->create();
        
        //Actualizamos los contratos para que estén activos solo los correctos.
        DB::table('clientes') //->where('activo', true)
                ->chunkById(100, function ($clientes) {
                    foreach ($clientes as $cliente) {
                        if (($cliente->numeroreconocimientoscontratados < $cliente->numeroreconocimientosutilizados)
                                OR ( new DateTime($cliente->fechafincontrato) < new DateTime('today'))) {
                            DB::table('clientes')
                            ->where('id', $cliente->id)
                            ->update(['activo' => false]);
                        } else {
                            DB::table('clientes')
                            ->where('id', $cliente->id)
                            ->update(['activo' => true]);
                        }
                    }
                });
        
    }
}
