<?php

namespace App;

use App\Role;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' //, 'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    
    //Cruzamos la tabla de clientes con municipios y provincias.
    public static function allUser() {
        $listado = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
                ->select('users.*', 'roles.description')
                ->get();

        return $listado;
    }
    
    //Devolvemos las cabeceras para la tabla
    public static function headers() {
        $listado = array('Nombre', 'Email', 'Rol');

        return $listado;
    }

    public function authorizeRoles($roles) {
        
        if(!$this->hasAnyRole($roles)) {
            \Session::flash('message', 'No estás autorizado para entrar en esta página.');   
            abort(403, 'No estas autorizado para entrar en esta página.');
        }
        //return $this->hasAnyRole($roles);
        //abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

}
