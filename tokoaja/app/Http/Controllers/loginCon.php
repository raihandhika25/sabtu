<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginCon extends Controller
{
    public function login() {
        if (Auth::check()){
            return redirect('dashboard');
        }else{
            return view ('login');
        }
    }
    public function actionlogin(Request $request){
        $data = [
            'email'=> $request->input('email'),
            'password' =>$request->input('password')
        ];
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }else{
            session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }
    public function actionlogout(){
        Auth::logout();
        return redirect('/');
    }
}
