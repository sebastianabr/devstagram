<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //  

    public function store($user,$post,Request $request){;
        $this->validate($request,[
            'comentario'=>'required|max:255'
        ]);
        Comentario::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$post,
            'comentario'=>$request->comentario
        ]);

        return back()->with('mensaje','Comentario Realizado Correctamente');
    }
}
