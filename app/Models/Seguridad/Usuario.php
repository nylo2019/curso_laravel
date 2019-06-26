<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Session;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuario';
    protected $fillable = [
        'nombre', 'usuario', 'password',
    ];
    protected $guarded = ['id'];
    

    public function roles()
    {    
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public function setSession($roles)
    {
        if (count($roles) == 1) {
            Session::put(
            [
                'rol_id'=> $roles[0]['id'],
                'rol_nombre'=> $roles[0]['nombre'],
                'usuario'=>$this->usuario,
                'usuario_id'=> $this->id,
                'usuario_nombre'=>$this->nombre

            ]           
            
            );
        }
    }

}