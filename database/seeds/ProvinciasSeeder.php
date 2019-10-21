<?php

use Illuminate\Database\Seeder;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->delete();
        DB::table('provincias')->insert([
            ['id' => '1', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Albacete', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '2', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Ciudad Real', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '3', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Cuenca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '4', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Guadalajara', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '5', 'country_id' => 1,'state_id' => 8, 'region_name' => 'Toledo', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '6', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Huesca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '7', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Teruel', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '8', 'country_id' => 1,'state_id' => 2, 'region_name' => 'Zaragoza', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '9', 'country_id' => 1,'state_id' => 18, 'region_name' => 'Ceuta', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '10', 'country_id' => 1,'state_id' => 13, 'region_name' => 'Madrid', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '11', 'country_id' => 1,'state_id' => 14, 'region_name' => 'Murcia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '12', 'country_id' => 1,'state_id' => 19, 'region_name' => 'Melilla', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '13', 'country_id' => 1,'state_id' => 15, 'region_name' => 'Navarra', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '14', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Almería', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '15', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Cádiz', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '16', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Córdoba', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '17', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Granada', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '18', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Huelva', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '19', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Jaén', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '20', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Málaga', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '21', 'country_id' => 1,'state_id' => 1, 'region_name' => 'Sevilla', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '22', 'country_id' => 1,'state_id' => 3, 'region_name' => 'Asturias', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '23', 'country_id' => 1,'state_id' => 6, 'region_name' => 'Cantabria', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '24', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Ávila', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '25', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Burgos', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '26', 'country_id' => 1,'state_id' => 7, 'region_name' => 'León', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '27', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Palencia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '28', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Salamanca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '29', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Segovia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '30', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Soria', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '31', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Valladolid', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '32', 'country_id' => 1,'state_id' => 7, 'region_name' => 'Zamora', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '33', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Barcelona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '34', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Gerona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '35', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Lérida', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '36', 'country_id' => 1, 'state_id' => 9, 'region_name' => 'Tarragona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '37', 'country_id' => 1, 'state_id' => 11, 'region_name' => 'Badajoz', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '38', 'country_id' => 1, 'state_id' => 11, 'region_name' => 'Cáceres', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '39', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Coruña, La', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '40', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Lugo', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '41', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Orense', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '42', 'country_id' => 1, 'state_id' => 12, 'region_name' => 'Pontevedra', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '43', 'country_id' => 1, 'state_id' => 17, 'region_name' => 'Rioja, La', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '44', 'country_id' => 1, 'state_id' => 4, 'region_name' => 'Baleares, Islas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '45', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Álava', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '46', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Guipúzcoa', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '47', 'country_id' => 1, 'state_id' => 16, 'region_name' => 'Vizcaya', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '48', 'country_id' => 1, 'state_id' => 5, 'region_name' => 'Palmas, Las', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '49', 'country_id' => 1, 'state_id' => 5, 'region_name' => 'Tenerife, Santa Cruz De', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '50', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Alicante', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '51', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Castellón', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '52', 'country_id' => 1, 'state_id' => 10, 'region_name' => 'Valencia', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        ]);
    }
}
