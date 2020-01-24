 <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Ruta Principal
Route::get('/','InicioController@index');
//Estoy pasando a traves de la Url el nombre o el dato 'permiso/{nombre}' es obligatorio, con el signo ?'permiso/{nombre?}' es opcional
//asi con el 'PermisoController@index' estoy accediendo al nombre del controlador('PermisoController)anexando el metodo (@index')
//Route::get('permiso/{nombre}/{slug?}', 'PermisoController@index');
//Dando un nombre a la ruta para acceder al controlador
//Route::get('admin/sistema/permiso', 'PermisoController@index')->name('permiso');
//Dando un nombre a la ruta con una expresion Regular
/*Route::get('permiso/{nombre}/{id?}', function($nombre,$id=false){
    return $nombre.'-'.$id;
})->where( 'nombre','[A-Za-z]+')->where('id','[0-9]+')->name('permiso');*/
