<?php

use App\Models\Permiso;
use Illuminate\Database\Seeder;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Permiso::class,50)->create();
        //en la siguiente linea se crea lo mismo pero ahora ocupando el metodo times(valordelparametro)
        //factory(Permiso::class)->times(50)->create();
    }
}
