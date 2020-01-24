<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos los roles que manejara la Tabla de rol
        $rols=[
            'administrador',
            'editor',
            'supervisor'];
        //insertaremos los datos a traves del foreach
        foreach($rols as $key => $value){
            DB::table('rol')->insert(['nombre'=> $value,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
        }
    }
}
