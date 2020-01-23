<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarioRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*aqui se crea la parte para la asignacion de las llaves secundarias entre tablas*/
            //Creando el campo de la llave foranea para conectar la tabal de Usuario_rol con la tabla rol
            //Tabla:Usuario_rol => rol_id <===> id <= rol:Tabla
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id','fk_usuariorol_rol')->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');
            //CReando el campo de la llave foranea para conectar la tabla de Usuario_rol con la tabla de Usuario
            //Tabla:Usuario_rol => usuario_id <===> id <= Usuario:Tabla
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id','fk_usuariorol_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');

            $table->boolean('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_rol');
    }
}
