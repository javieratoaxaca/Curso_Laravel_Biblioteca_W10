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

//Estoy pasando a traves de la Url el nombre o el dato 'permiso/{nombre}' es obligatorio, con el signo ?'permiso/{nombre?}' es opcional
//asi con el 'PermisoController@index' estoy accediendo al nombre del controlador('PermisoController)anexando el metodo (@index')
//Route::get('permiso/{nombre}/{slug?}', 'PermisoController@index');
//Dando un nombre a la ruta para acceder al controlador
//Route::get('admin/sistema/permiso', 'PermisoController@index')->name('permiso');
//Dando un nombre a la ruta con una expresion Regular
/*Route::get('permiso/{nombre}/{id?}', function($nombre,$id=false){
    return $nombre.'-'.$id;
})->where( 'nombre','[A-Za-z]+')->where('id','[0-9]+')->name('permiso');*/

//Ruta Principal
Route::get('/','InicioController@index');
//Ruta de acceso del administrador por medio de grupos para poner prefijos
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear- permiso');
    Route::get('permiso/guardar', 'PermisoController@guardar')->name('guardar-permiso');
    Route::get('permiso/mostrar', 'PermisoController@mostrar')->name('mostrar-permiso');
    Route::get('permiso/editar', 'PermisoController@editar')->name('editar-permiso');
    Route::get('permiso/actualizar', 'PermisoController@actualizar')->name('actualizar-permiso');
    Route::get('permiso/eliminar', 'PermisoController@eliminar')->name('eliminar-permiso');
});


