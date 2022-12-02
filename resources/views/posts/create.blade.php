@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@push('scriptDropZone')
    @vite("resources/js/app.js")
@endpush
@section('contenido')
    <div class="md:flex md:items-center">
        <h1>Ruperto es el  mas apuesto de toda la universidad</h1>
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-2 w-full h-96 rounded flex flex-col justify-center items-center">@csrf</form>
        </div>
        <div class="p-10 md:w-6/12 mt-10 bg-white rounded-xl shadow-xl md:mt-5">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                        Nombre
                    </label>

                    <input type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo de la publicación"
                        class='border p-3 w-full rounded-lg @error('name') border-red-500 @enderror'  
                        value="{{ old('titulo') }}"

                    />
                    @error('titulo')
                        <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                        Descripcion
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripcion de la publicación"
                        class='border p-3 w-full rounded-lg @error('name') border-red-500 @enderror'  
                        value="{{ old('descripcion') }}"

                    ></textarea>

                    @error('descripcion')
                        <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                    @enderror

                    <div class="mb-5">
                        <input type="hidden" name="imagen" type="hidden" value="{{old('imagen')}}">
                    </div>
                    @error('imagen')
                    <p class="bg-red-300 text-red-800 pl-4 py-2 rounded-sm">{{ $message }}</p>
                     @enderror

                    <div class="w-full mt-5">
                        <input type="submit" value="Crear Publicacion" class="bg-sky-600 block mx-auto px-5 py-3 white text-white rounded-lg hover:bg-sky-800 w-full hover:cursor-pointer sm:w-auto">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection