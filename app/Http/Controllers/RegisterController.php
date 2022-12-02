<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){

        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email|min:3|max:60',
            'username'=>'required|unique:users|min:3|max:30',
            'password'=>'required|confirmed|min:5',
            'password_confirmation'=>'required',
        
            
        ]);
        User::create([
            'name'=>$request->name,
            'username'=>Str::slug($request->username),
            'email'=>$request->email,
            'password'=>Hash::make( $request->password),
            'imagen'=>null
        ]);
        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        return redirect()->route('posts.index',auth()->user()->username);

    }

}
