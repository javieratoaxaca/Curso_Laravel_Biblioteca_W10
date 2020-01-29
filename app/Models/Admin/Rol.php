<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table="rol";
    //cuales son los campos o atributos al modelo dentro de un array
    protected $fillable=['nombre'];
    //Cuales son los campos que no puedan modificar
    protected $guarded=['id'];
}
