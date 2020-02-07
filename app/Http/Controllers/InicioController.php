<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //esto es para mostrar los datos de la variable de session
        //dd(session()->all());
        return view('inicio');
    }


}
