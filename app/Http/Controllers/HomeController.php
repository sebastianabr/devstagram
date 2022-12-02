<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function __invoke()
    {
        $followers=[];
        $ids = auth()->user()->followers->pluck('id');
        $posts = Post::whereIn('user_id',$ids)->orderBy('created_at')->paginate(20);
        return view('home',['posts'=>$posts]);  
    }
}
