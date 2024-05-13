<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
     * 
     */
    // protected $redirectTo = '/home';


    protected function authenticated(Request $request, $user)
    {
        $credentials = $request->only('email', 'password');

        Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('profile');
            } else {
                return redirect()->route('home');
            }
        } else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
    }

   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
