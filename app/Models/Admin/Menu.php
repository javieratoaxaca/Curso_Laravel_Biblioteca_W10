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

}
