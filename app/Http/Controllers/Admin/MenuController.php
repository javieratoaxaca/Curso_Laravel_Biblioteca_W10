<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionMenu;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus=Menu::getMenu();
        return view('admin.menu.index',compact('menus'));
        //dd($menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //Aqui cargare el menu para el admin
        return view('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*se modifica la libreria de Request para poner las validaciones
    public function guardar(Request $request)
    {
        //Esto nos sirve para ver que datos se estan enviando a traves de la ruta que creamos
        //dd($request->all());
        /*Aqui ya insertamos los  datos en nuestra tabla de menu a traves de nuestro modelo "Menu"/
         Menu::create($request->all());
         return view('admin.menu.crear');
    }*/
    public function guardar(ValidacionMenu $request)
    {
        //Esto nos sirve para ver que datos se estan enviando a traves de la ruta que creamos
        //dd($request->all());
        /*Aqui ya insertamos los  datos en nuestra tabla de menu a traves de nuestro modelo "Menu"*/
         Menu::create($request->all());
         return redirect('admin/menu/crear')->with('mensaje','Menú Creado con Exito');
         //return view('admin.menu.crear')->with('mensaje','Menú Creado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }

    public function guardarOrden(Request $request){
        if($request->ajax()){
            $menu=new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta'=>'ok']);
        }else{
            abort(404);
        }
    }
}
