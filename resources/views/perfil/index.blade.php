@extends('layouts.app');

@section('titulo')
    Editar Perfil: {{$user->username}}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store',$user) }}" enctype="multipart/form-data" method="POST" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                        Username
                    </label>

                    <input type="text"
                        id="username"
                        name="username"
                        placeholder="tu nombre de usuario"
                        class="border p-3 w-full rounded-lg"
                        value="{{ auth()->user()->username}}"
                    />
                    @error('username')
                    <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-5">
                    <label id="imagen" class="mb-2 block uppercase text-gray-500 font-bold" for="imagen">
                        Imagen
                    </label>

                    <input type="file"
                        id="imagen"
                        name="imagen"
                        placeholder="tu nombre de usuario"
                        class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png"
    
                    />
                    @error('o,agem')
                    <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                @enderror
                </div>
                <div class="w-full">
                    <input type="submit" value="Actualizar Perfil" class="bg-sky-600 block mx-auto px-5 py-3 white text-white rounded-lg hover:bg-sky-800 w-full hover:cursor-pointer sm:w-auto">
                </div>
            </form>
        </div>
    </div>
@endsection