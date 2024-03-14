<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerForm(){
        return view('registration');
    }

    public function create(Request $request){
        $request->validate([
            'email' => 'required | regex:/(.*)@gmail\.com/',
            'pass' => 'required | min:5',
            'confpass' => 'required |min:5'
        ]);

        if($request->pass != $request->confpass){
            return back()->withErrors('the password didn\'t match');
        }

        User::create([
            'email' => $request->email,
            'pass' => Hash::make($request->pass)
        ]);     
        return redirect('/login')->with('success', 'User registered!');
    }

    public function login(){
        return view('login');
    }

    public function logedin(Request $request){
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        
        $user = User::where('email','=', $request->email)->first();
        if($user && Hash::check($request->password, $user->pass)){
            Auth::login($user);
            if(Auth::check()){
                return redirect('/');
            }else{
                return redicrect('/login');     
            }
        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        // if(Auth::attempt($credentials)){
        //     $request->session()->regenerate();

        // }
        

    }
}
