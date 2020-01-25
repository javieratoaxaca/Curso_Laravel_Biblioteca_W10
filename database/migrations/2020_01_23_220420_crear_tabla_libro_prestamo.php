<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaLibroPrestamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_prestamo', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*aqui se crea la parte para la asignacion de las llaves secundarias entre tablas*/

            //Creando el campo de la llave foranea para conectar la tabla de Usuario con la tabla de Libro_prestamo
            //Tabla:Usuario => id <=== usuario_id <= Libro_prestamo:Tabla
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id','fk_libroprestamo_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');

            //Creando el campo de la llave foranea para conectar la tabla de libro con la tabla libro_prestamo
            //Tabla:libro => id <===> libro_id <= Libro_prestamo:Tabla
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id','fk_libroprestamo_libro')->references('id')->on('libro')->onDelete('restrict')->onUpdate('restrict');

            $table->date('fecha_prestamo');
            $table->string('prestado_a',100);
            $table->boolean('estado');
            $table->date('fecha_devolucion')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('libro_prestamo');
    }
}
