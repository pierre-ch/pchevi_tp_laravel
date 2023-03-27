<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Validation\ValidationException;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     if(!$user->actif)
    //     {
    //         Session::flush();
    //         Auth::logout();
    //         throw ValidationException::withMessages([$this->username() => __('Only active users are allowed to login')]);
    //     }
    // }

    // public function username()
    // {
    // return 'login';
    // }   

    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1

    protected function validateLogin(Request $request)
    {
        //récupération de l'utilisateur qui a cet email
        // dd($request);
        //$user = User::where($this->username(), $request->input($this->username()))->first();
        $user = User::where('email', $request['email'])->first();
        //Si utilisateur existe et non actif
        if ($user && ! $user->actif) {
            throw ValidationException::withMessages([$this->username() => __('Only active users are allowed to login')]);
        }
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }


}
