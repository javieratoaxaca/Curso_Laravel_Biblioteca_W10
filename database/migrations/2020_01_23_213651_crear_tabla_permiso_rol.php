<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPermisoRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_rol', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*aqui se crea la parte para la asignacion de las llaves secundarias entre tablas*/
            //Creando el campo de la llave foranea para conectar la tabla de rol con la tabla permiso_rol
            //Tabla:rol => id <===> rol_id <= permiso_rol:Tabla
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id','fk_permisorol_rol')->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');

            //Creando el campo de la llave foranea para conectar la tabla de Permiso_rol con la tabla de Permiso
            //Tabla:Permiso => id <===> permiso_id <= permiso_rol:Tabla
            $table->unsignedBigInteger('permiso_id');
            $table->foreign('permiso_id','fk_permisorol_permiso')->references('id')->on('permiso')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('permiso_rol');
    }
}
