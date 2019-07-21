<?php

namespace Corp\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $loginView;

     public function username()
    {
        return 'login';
    }

    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->loginView = env('THEME').'.login';
    }

    public function showLoginForm()
    {
        return view($this->loginView)->with('title', 'Вход на сайт');

        
    }

}
