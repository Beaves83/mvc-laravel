<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();
        
        $role = new Role();
        $role->name = 'medico';
        $role->description = 'Médico';
        $role->save();
        
        $role = new Role();
        $role->name = 'secretario';
        $role->description = 'Secretario';
        $role->save();       
    }
}
