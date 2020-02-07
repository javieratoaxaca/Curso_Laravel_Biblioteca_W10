<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Rol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $remember_token=false;
    protected $table='usuario';
    //creamos una vaariable protect para la cuestion de validacion de los campos de la table de Usuario
    protected $fillable=[
        'usuario','nombre','password',
    ];
    protected $guarded=['id'];

    //aqui manejare el rol para la tabla de usuario que creamos no la de Laravel
    public function roles(){
        //Relaciona de muchos a muchos de la tabla de usuario a la tabla de rol a traves de la tabla de usuario_rol
        return $this->belongsToMany(Rol::class,'usuario_rol');
    }
    //
    public function setSession($roles){
        if(count($roles)==1){
            Session::put([
                'rol_id'=>$roles[0]['id'],
                'rol_nombre'=>$roles[0]['nombre'],
                //'nombre'=>$this->nombre
                //po si se desea que se muestren los datos del usuario
                'usuario'=>$this->usuario,
                'usuario_id'=>$this->id,
                'nombre_usuario'=>$this->nombre,
            ]);
        }else{

        }
    }
}
