@extends('layouts.app')
@section('titulo')
    Registrate en Devstagram

@endsection

@section('contenido')
    <div class="md:flex justify-center md:gap-8 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="imagen registro usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-xl shadow-xl">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label id="name" class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                        Nombre
                    </label>

                    <input type="text"
                        id="name"
                        name="name"
                        placeholder="tu nombre"
                        class='border p-3 w-full rounded-lg @error('name') border-red-500 @enderror'  
                        value="{{ old('name') }}"

                    />
                    @error('name')
                        <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                        Username
                    </label>

                    <input type="text"
                        id="username"
                        name="username"
                        placeholder="tu nombre de usuario"
                        class="border p-3 w-full rounded-lg"
                    />
                    @error('username')
                    <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                @enderror
                </div>

                <div class="mb-5">
                    <label id="email" class="mb-2 block uppercase text-gray-500 font-bold" for="email">
                        Email
                    </label>

                    <input type="email"
                        id="email"
                        name="email"
                        placeholder="tu email de registro"
                        class="border p-3 w-full rounded-lg"
                    />
                    @error('email')
                    <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                @enderror
                </div>

                <div class="mb-5">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                        Password
                    </label>

                    <input type="password"
                        id="password"
                        name="password"
                        placeholder="tu contraseña"
                        class="border p-3 w-full rounded-lg"
                    />
                    @error('password')
                    <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                @enderror
                </div> 
                <div class="mb-5">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">
                        Repetir Password
                    </label>

                    <input type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu contraseña"
                        class="border p-3 w-full rounded-lg"
                    />
                </div>
                <div class="w-full">
                    <input type="submit" value="Crear cuenta" class="bg-sky-600 block mx-auto px-5 py-3 white text-white rounded-lg hover:bg-sky-800 w-full hover:cursor-pointer sm:w-auto">
                </div>
            </form>
        </div>
    </div>
@endsection