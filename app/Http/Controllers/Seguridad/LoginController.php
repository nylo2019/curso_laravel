<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\View\View;


class LoginController extends Controller
{
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
        return view('seguridad.index');
    }

    

    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->where('estado', 1)->get();
            if ($roles->isNotEmpty()) {
            $user->setSession($roles->toArray());
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect ('seguridad/login')->withErrors(['error'=>'Este Usuario no tiene un rol Activo']);


        }

    }

    public function username()
    {
        return 'usuario';
    }
    
}
