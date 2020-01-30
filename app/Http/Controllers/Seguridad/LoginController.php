<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Se agreaga esta libreria que viene por default en Laravel
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //Se utilizan estas variables
    use AuthenticatesUsers;
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('seguridad.index');
    }
    //utilizo esta funcion para renombrar la solicitud por default de Login en Laravel
    //para esta forma se utilice en vez de 'email' sea 'usuario'
    public function username()
    {
        return 'usuario';
    }

}
