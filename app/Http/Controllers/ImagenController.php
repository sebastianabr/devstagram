<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ImagenController extends Controller
{
    //

    public function store(Request $request){
        $input =$request->file('file');
        $nombreImagen = Str::uuid() . '.' . $input->extension();
        $imagenServidor = Image::make($input);
        $imagenServidor->fit(1000,1000);
        $imagePath = public_path('uploads/' . $nombreImagen);
        $imagenServidor->save($imagePath);
        return response()->json(['imagen'=>$nombreImagen]);

    }
}
