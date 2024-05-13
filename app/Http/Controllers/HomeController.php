<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');

        Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('log');
            } else {
                return redirect()->route('log');
            }
        } else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
    }
}
