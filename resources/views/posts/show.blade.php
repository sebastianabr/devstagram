@extends('layouts.app');

@section('titulo')
    {{$post->titulo}}
@endsection
    
@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="imagen del post {{ $post->titulo }}">

            <div class="p-3 flex items-center gap-4">
                @auth
                <livewire:like-post :post="$post"/>



                @endauth

            </div>

            <div>
                <p class="font-bold" >{{ $post->user->username }}</p>
                <p>{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion}}</p>
            </div>
            @auth
                @if(auth()->user()->id === $post->user->id)
                    <form method="POST"  action="{{  route('posts.destroy',$post) }}">
                        @method('DELETE')
                        @csrf
                        <input 
                            value="Eliminar Publicacion"
                            class="bg-red-500 hover:bg-red-700 p-2 rounded-md text-white font-bold mt-2 cursor-pointer"
                            type="submit">
                    </form> 
                @endif

            
            @endauth


        </div >

        <div class="md:w-1/2 ">
            @auth
            <div class="shadow bg-white p-5 mb-5 ml-5">
                <p class="text-xl text-center mb-4 font-bold">Deja tu comentario</p>

                @if(session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold text-center">
                        {{ session('mensaje') }}
                    </div>

                @endif

                <form action="{{ route('comentarios.store',["post"=>$post,"user"=>$user]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label id="comentario" class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                            Añade un comentario
                        </label>
    
                        <input type="comentario"
                            id="comentario"
                            name="comentario"
                            placeholder="Coloca tu comentario"
                            class="border p-3 w-full rounded-lg"
                        />
                        @error('comentario')
                        <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                    @enderror

                    <div class="w-full mt-5">
                        <input type="submit" value="Comentar" class="bg-sky-600 block mx-auto px-5 py-3 white text-white rounded-lg hover:bg-sky-800 w-full hover:cursor-pointer sm:w-auto">
                    </div>
                </form>

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if($post->comentarios()->count()>0)
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a class="text-blue-600 font-bold" href="{{ route('posts.index',['user'=>$comentario->user->username])  }}" >{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at}}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center  text-gray-500 mt-10">No hay comentarios aun</p>

                    @endif
                </div>
            </div>
            @endauth

        </div>
    </div>
@endsection