@extends('layouts.app')

@section('title','Editar Pregunta')

@section('content')

<div class="w-2/4 h-2/4 bg-blue-300 shadow rounded flow-root flex m-auto mt-8 ">
    
   @foreach ($pregunta as $datosPregunta)
   <form action="{{route('docente.guardarpreguntaeditada', $datosPregunta)}}" method="POST">
    @csrf
    @method('put')
    <div class="border border-2px h-9 bg-white text-center" >
        <label class="font-bold ml-2 mr-11 text-2xl text-center">Preguntas del examen</label>
    </div>

    <div class="mb-4 relative ml-7 mr-7 mt-3 ">
        <label for="pregunta" class="block text-gray-700 text-xl font-bold mb-2">Pregunta:</label>
        <div class="relative shadow-sm  rounded ">
            <div>
                <input type="text" name="pregunta" class="shadow appearence-none border-rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$datosPregunta->pregunta}}" >

                @error('pregunta')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full 
                    text-red-600 p-2 my-2 ">* {{$message}}</p>
                @enderror

            </div>
        </div>
    </div>

    <div class="mb-4 relative ml-7 mr-7 mt-3 ">
        <label for="opcion1" class="block text-gray-700 text-xl font-bold mb-2">Opcion 1:</label>
        <div class="relative shadow-sm  rounded ">
            <div>
                <input type="text" name="opcion1" class="shadow appearence-none border-rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$datosPregunta->opcion1}}">

                @error('opcion1')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full 
                    text-red-600 p-2 my-2 ">* {{$message}}</p>
                @enderror

            </div>
        </div>
    </div>

    <div class="mb-4 relative ml-7 mr-7 mt-3 ">
        <label for="opcion2" class="block text-gray-700 text-xl font-bold mb-2">Opcion 2:</label>
        <div class="relative shadow-sm  rounded ">
            <div>
                <input type="text" name="opcion2" class="shadow appearence-none border-rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$datosPregunta->opcion2}}">

                @error('opcion2')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full 
                    text-red-600 p-2 my-2 ">* {{$message}}</p>
                @enderror

            </div>
        </div>
    </div>

    <div class="mb-4 relative ml-7 mr-7 mt-3 ">
        <label for="opcion3" class="block text-gray-700 text-xl font-bold mb-2">Opcion 3:</label>
        <div class="relative shadow-sm  rounded ">
            <div>
                <input type="text" name="opcion3" class="shadow appearence-none border-rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$datosPregunta->opcion3}}">

                @error('opcion3')
                    <p class="border border-red-500 rounded-md bg-red-100 w-full 
                    text-red-600 p-2 my-2 ">* {{$message}}</p>
                @enderror

            </div>
        </div>
    </div>

    <div class="mb-4 relative ml-7 mr-7 mt-3 ">
        <label for="correcta" class="block text-gray-700 text-xl font-bold mb-2">Respuesta correcta:</label>
        <div class="relative shadow-sm  rounded ">
            <div>
                {{-- <input type="text" name="correcta" class="shadow appearence-none border-rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$datosPregunta->correcta}}"> --}}
                <div class='mb-4 relative'>
                    <div class='relative rounded shadow-sm'>
                    <div>
                        <select name='correcta' id='correcta' class='shadow appearence-none border 
                             rounded w-full py-2 pr-3 pl-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                            <option value='{{$datosPregunta->correcta}}'>{{$datosPregunta->correcta}}</option>
                            <option value='1'>Opcion 1</option>
                            <option value='2'>Opcion 2</option>
                            <option value='3'>Opcion 3</option>
                        </select>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                    </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="mb-4 relative ml-7 mr-7 mt-3" hidden>
        <label for="idExamen" class="block text-gray-700 text-xl font-bold mb-2">Id Examen:</label>
        <div class="relative shadow-sm  rounded ">
            <div>
                <input type="text" name="idExamen" value="{{$datosPregunta->idExamen}}" class="shadow appearence-none border-rounded w-full py-2 px-4.5 pr-3 pl-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>
    </div>

    <button type="submit" class="bg-gray-400 hover:bg-blue-500 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-1/4 ml-7 mb-5 float-left m-auto mt-2">Guardar</button>
</form>
<a href="{{route('docente.editarexamen', $datosPregunta->idExamen)}}" ><button class="bg-gray-400 hover:bg-blue-500 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-1/4 mr-7 mb-5 float-right m-auto mt-2">Salir</button></a>
   @endforeach
</div>
   
    
@endsection