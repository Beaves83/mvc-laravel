<?php
use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos usuario con el perfil de Administrador
        $user = new User();
        $user->name = 'Administrador de pruebas';
        $user->password = Hash::make('admin@email.es');
        $user->email = 'admin@email.es';
        $user->email_verified_at = new \DateTime();
        $user->created_at = new \DateTime();
        $user->updated_at = new \DateTime();      
        $user->save();    
        $user->roles()->attach(Role::where('name', 'admin')->first());
             
        //Creamos usuario con el perfil de Secretario
        $user = new User();
        $user->name = 'Secretario de pruebas';
        $user->password = Hash::make('secretario@email.es');
        $user->email = 'secretario@email.es';
        $user->email_verified_at = new \DateTime();
        $user->created_at = new \DateTime();
        $user->updated_at = new \DateTime();      
        $user->save();    
        $user->roles()->attach(Role::where('name', 'secretario')->first());
        
        //Creamos usuario con el perfil de Médico
        $user = new User();
        $user->name = 'Médico de pruebas';
        $user->password = Hash::make('medico@email.es');
        $user->email = 'medico@email.es';
        $user->email_verified_at = new \DateTime();
        $user->created_at = new \DateTime();
        $user->updated_at = new \DateTime();      
        $user->save();    
        $user->roles()->attach(Role::where('name', 'medico')->first());
        
    }
}
