<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user){
        return view('perfil.index',['user'=>$user]);
    }

    public function store(Request $request){
        $request->request->add(['username'=>Str::slug($request->username)]);
        $this->validate($request,[
            'username'=>'required|min:3|max:20|unique:users',
        ]);

        if($request->imagen){

            $input =$request->file('imagen');
            $nombreImagen = Str::uuid() . '.' . $input->extension();
            $imagenServidor = Image::make($input);
            $imagenServidor->fit(1000,1000);
            $imagePath = public_path('perfiles/' . $nombreImagen);
            $imagenServidor->save($imagePath);
        }
        $usuario= User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ??null;
        $usuario->save();

        return redirect()->route('posts.index',$usuario);

    }
}
