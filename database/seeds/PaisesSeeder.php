<?php

use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paises')->delete();
        DB::table('paises')->insert([
            'id'            => 1, 
            'nombre'  => 'España', 
            'created_at'    => new DateTime, 
            'updated_at'    => new DateTime
        ]);
    }
}
