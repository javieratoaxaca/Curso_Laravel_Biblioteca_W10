<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table="menu";
    //cuales son los campos o atributos al modelo dentro de un array
    protected $fillable=['nombre','url','icono'];
    //Cuales son los campos que no puedan modificar
    protected $guarded=['id'];
    /*Creacion de una funcion para maneja los ide entre tablas */
    public function roles(){
        //aqui esta haciendo una relacion de mi modelo de Rol con la tabla de Menu_rol c
        //esta haciendo la conexion de muchos a muchos de la tabla rol y la tabla menu_rol (Tabla:Rol:id =>> menu_rol:Menu_rol:Tabla)
        return $this->belongsToMany(Rol::class,'menu_rol');

    }

    /* Hecha por mi
    public function getHijos($padres,$line){
        $children=[];
        foreach($padres as $line1){
            if($line['id']==$line1['menu_id']){
                $children=array_merge($children,[array_merge($line1,['submenu'->$this->getHijos($padres,$line1)])]);
            }
        }
        return $children;
    }*/
    /*Hecha Por mi
    /*public function getPadres($front){
        if($front){
            return $this->whereHas('roles',function($query){
                $query->where('rol_id',session()->get('rol_id'))->orderby('menu_id');
            })//->where('estado',1)
                ->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        }else{
            return $this->ordeby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        }
    }*/
    /***ESto es parte del codigo del Desarrollador ya que le mio marca error*/
    public function getHijos($padres, $line)
    {
        $children = [];
        foreach ($padres as $line1) {
            if ($line['id'] == $line1['menu_id']) {
                $children = array_merge($children, [array_merge($line1, ['submenu' => $this->getHijos($padres, $line1)])]);
            }
        }
        return $children;
    }

    public function getPadres($front)
    {
        if ($front) {
            return $this->whereHas('roles', function ($query) {
                $query->where('rol_id', session()->get('rol_id'))->orderby('menu_id');
            })->where('estado',1)
                ->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        }
    }

    public static function getMenu($front=false){
        $menus=new Menu();
        $padres=$menus->getPadres($front);
        $menuAll=[];
        foreach($padres as $line){
            if($line['menu_id']!=0)
            break;
            $item=[array_merge($line,['submenu'=>$menus->getHijos($padres,$line)])];
            $menuAll=array_merge($menuAll,$item);
        }
        return $menuAll;
    }
    public function guardarOrden($menu){
        $menus = json_decode($menu);

        foreach ($menus as $var => $value) {
            $this->where('id', $value->id)->update(['menu_id' => 0, 'orden' => $var + 1]);
            if (!empty($value->children)) {

                foreach ($value->children as $key => $vchild) {
                    $update_id = $vchild->id;
                    $parent_id = $value->id;
                    $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);

                    if (!empty($vchild->children)) {
                        foreach ($vchild->children as $key => $vchild1) {
                            $update_id = $vchild1->id;
                            $parent_id = $vchild->id;
                            $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);

                            if (!empty($vchild1->children)) {
                                foreach ($vchild1->children as $key => $vchild2) {
                                    $update_id = $vchild2->id;
                                    $parent_id = $vchild1->id;
                                    $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);

                                    if (!empty($vchild2->children)) {
                                        foreach ($vchild2->children as $key => $vchild3) {
                                            $update_id = $vchild3->id;
                                            $parent_id = $vchild2->id;
                                            $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'orden' => $key + 1]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
