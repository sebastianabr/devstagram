<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|min:6',
            'password'=>'required|min:5',
        ]);
        if(!auth()->attempt($request->only('email','password'),$request->confirmation)){
            return back()->with('mensaje','Credenciales incorrectas');
        }
    
    

        return redirect()->route('posts.index',auth()->user()->username);

    }
}
