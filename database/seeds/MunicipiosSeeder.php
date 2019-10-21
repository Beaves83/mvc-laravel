z<?php

use Illuminate\Database\Seeder;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->truncate();
        $municipios = [
            ["id" => 52, "state_id" => 1, "region_id" => "14", "city_name" => "Huercal de Almería", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["id" => 101, "state_id" => 1, "region_id" => "14", "city_name" => "Viator", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["id" => 82, "state_id" => 1, "region_id" => "14", "city_name" => "Senés", "created_at" => new DateTime, "updated_at" => new DateTime],
            ["id" => 57, "state_id" => 1, "region_id" => "14", "city_name" => "Láujar de Andarax", "created_at" => new DateTime, "updated_at" => new DateTime],
        ];
        DB::table('municipios')->insert($municipios);
    }
}
