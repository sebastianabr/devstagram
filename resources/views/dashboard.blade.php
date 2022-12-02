@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="mx-auto w-2/4 md:w-8/12 lg:w-6/12 px-5">
               <img  src="{{ $user->imagen ? asset('perfiles') ."/" .$user->imagen : asset('img/usuario.svg') }}" alt="imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center mt-5 justify-center md:items-start  md:justify-center">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl mb-4">{{ $user->username }} </p>

                    @auth
                        @if($user->id===auth()->user()->id)
                            <a href="{{ route('perfil.index',$user) }}" class="mb-4  hover:cursor-pointer text-gray-500 hover:text-gray-600" href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                              </svg>
                              
                              </a>
                        @endif
                    @endauth
                </div>


                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followers->count() }} <span class="font-normal">seguidores</span>  
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                   {{ $user->followed->count() }} <span class="font-normal">seguiendo</span>  
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }} <span class="font-normal">posts</span>  
                </p>
                @auth

                    @if($user->id !==auth()->user()->id)
                        @if($user->followers->contains(auth()->user()))
                            <form action="{{ route('users.unfollow',$user) }}" method='POST'>
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="bg-red-600 text-white uppercase rounded-md px-3 py-1 font-bold cursor-pointer" value="Dejar de seguir">
                            </form>
                        @else
                            <form action='{{ route("users.follow",$user)}}' method='POST'>
                                @csrf
                                <input type="submit" class="bg-blue-600 text-white uppercase rounded-md px-3 py-1 font-bold cursor-pointer" value="seguir">
                            </form>

                        @endif
  
                    @endif

                @endauth
  
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if($posts->count()>0)
            <x-listar-post :posts="$posts" />


        @else
            <p class="text-gray-500 uppercase text-center">No hay posts</p>

        @endif

    </section>

@endsection