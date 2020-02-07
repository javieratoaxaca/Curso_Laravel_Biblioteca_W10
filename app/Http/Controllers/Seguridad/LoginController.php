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
    protected $redirectTo = '/';

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
    //esta funcion servira para la autenticacion de los usuarios
    public function authenticated(Request $request,$user){
        //aqui es para recuperar la coleccion de los datos de la tabla de roles
        $roles =$user->roles()->where('estado',1)->get();

        //if ($user->roles()->where('estado',1)->get()->isNotEmpty()) {
        if($roles->isNotEmpty()){
            # code...
            //auth()->user()->setSession()
            $user->setSession($roles->toArray());

        } else {
            # code...
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/login')->withErrors(['error'=>'Este usuario no tiene un Rol Activo']);
        }

    }
    //utilizo esta funcion para renombrar la solicitud por default de Login en Laravel
    //para esta forma se utilice en vez de 'email' sea 'usuario'
    public function username()
    {
        return 'usuario';
    }

}
