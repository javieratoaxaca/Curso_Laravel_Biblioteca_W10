<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMenuRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_rol', function (Blueprint $table) {
            /*aqui se crea la parte para la asignacion de las llaves secundarias entre tablas*/
            //Creando el campo de la llave foranea para conectar la tabla de rol con la tabla menu_rol
            //Tabla:rol => id <===> rol_id <= menu_rol:Tabla
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id','fk_menurol_rol')->references('id')->on('rol')->onDelete('restrict')->onUpdate('restrict');

            //Creando el campo de la llave foranea para conectar la tabla de Permiso_rol con la tabla de Permiso
            //Tabla:menu => menu_id <===> id <= menu_rol:Tabla
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id','fk_menurol_menu')->references('id')->on('menu')->onDelete('restrict')->onUpdate('restrict');

            //$table->timestamps();
            //Se agrega complementos a la tabla para mejor actividad
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_rol');
    }
}
