@extends('layouts.app')

@section('title','Examen')

@section('content')

<div class="w-2/4 h-2/4 bg-blue-300 shadow rounded flow-root flex m-auto mt-8 ">
    
    <form action="{{route('docente.guardarexamen')}}" method="POST">
        @csrf
        <div class="border border-2px h-9 bg-white text-center" >
            <label class="font-bold ml-2 mr-11 text-2xl text-center">Datos Examen</label>
            <label class="font-serif ml-2 text-xl float-left">Profesor: {{auth()->user()->name}}</label>
        </div>

        <div class="mb-4 relative ml-7 mr-7 mt-3 pt-8">
            <label for="titulo" class="block text-gray-700 text-xl font-bold mb-2">Titulo Examen:  </label>
            <div class="relative shadow-sm  rounded ">
                <div>
                    <input type="text" name="titulo" class="shadow appearence-none border-rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ingrese el titulo del examen">

                    @error('titulo')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full 
                    text-red-600 p-2 my-2 ">* {{$message}}</p>
                    @enderror

                    @error('message')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full 
                    text-red-600 p-2 my-2 ">* {{$message}}</p>
                    @enderror

                </div>
            </div>
        </div>

        <button type="submit" class="bg-gray-400 hover:bg-blue-500 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-1/4 ml-7 mb-5 float-left m-auto mt-2">Guardar</button>
    </form>
    <a href="{{route('docente.show')}}"><button class="bg-gray-400 hover:bg-blue-500 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-1/4 mr-7 mb-5 float-right m-auto mt-2">Salir</button></a>
</div>
   
    
@endsection