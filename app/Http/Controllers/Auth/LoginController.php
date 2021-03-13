<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo;

    public function redirectTo()
    {
        switch(Auth::user()->type){
            case "NORMAL":
            $this->redirectTo = '/NORMAL';
            return $this->redirectTo;
                break;
            case "ADMINISTRATEUR":
                    $this->redirectTo = '/ADMINISTRATEUR';
                return $this->redirectTo;
                break;
            case "CHEFUNITE":
                $this->redirectTo = '/CHEFUNITE';
                return $this->redirectTo;
                break;

            case "SYSADM":
                $this->redirectTo = '/SYSADM';
                return $this->redirectTo;
                break;

            case "COMMISSION":
                $this->redirectTo = '/COMMISSION';
                return $this->redirectTo;
                break;

            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }

        // return $next($request);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
}
