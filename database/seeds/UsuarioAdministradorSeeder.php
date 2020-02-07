<?php

use Illuminate\Database\Seeder;


class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Aqui creamos o insertamos el usuario administrador para la base de datos
        DB::table('usuario')->insert([
            'usuario'=>'biblioteca_admin',
            'password'=>bcrypt('pass123'),
            'nombre'=>'Administrador',
        ]);

        /*aqui es para insertar los datos para darle un rol al usuario de administrador para la tabla de usuario_rol <----> usuario*/
        DB::table('usuario_rol')->insert([
            'usuario_id'=>1,
            'rol_id'=>1,
            'estado'=>1,
        ]);
    }
}
