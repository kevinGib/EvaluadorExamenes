@extends('layouts.app')

@section('title','Ver Examen')

@section('content')

  <form action="{{route('alumno.respuestas')}}" method="POST">
      @csrf

    <div class="w-3/4 h-3/4 bg-blue-300 flow-root mt-8 m-auto">
        <div class="border border-2px h-10 bg-white text-center flow-root">
            @foreach ($examenes as $item)

            <label class="font-bold ml-2 text-2xl text-center">{{$item->titulo}}</label>

            <input  name="idExamen" value="{{$item->idExamen}}" hidden>
            <input  name="Examen" value="{{$item->titulo}}" hidden>
            <input  name ="idDocente" value="{{$item->id_user}}" hidden>      
            <input  name ="nombreUsuario" value="{{auth()->user()->name}}" hidden>

            
            <button class="hover:bg-blue-300 float-right shadow rounded bg-gray-300 mt-1 mr-2 py-1 px-7">Guardar</button>
            @endforeach    
        </div>
            @foreach ($examen as
            $key=>
            $pregunta)
    
             @if ($key == 0)
             <div class=" float-left ml-5 ">
                <label class="text-xl font-bold">{{$key+1}}. {{$pregunta->pregunta}}</label><br>
                <label class="mx-2 ">
                    <input  value="{{$pregunta->opcion1}}" name="resp1" type="radio"> {{$pregunta->opcion1}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion2}}" name="resp2" type="radio"> {{$pregunta->opcion2}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion3}}" name="resp3" type="radio"> {{$pregunta->opcion3}}
                </label>

                <input value="{{$pregunta->correcta}}" name="correcta{{$key+1}}" hidden >
            </div>
             @endif
    
             @if ($key == 1)
             <div class=" float-left ml-5 ">
                <label class="text-xl font-bold">{{$key+1}}. {{$pregunta->pregunta}}</label><br>
                <label class="mx-2 ">
                    <input  value="{{$pregunta->opcion1}}" name="resp4" type="radio"> {{$pregunta->opcion1}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion2}}" name="resp5" type="radio"> {{$pregunta->opcion2}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion3}}" name="resp6" type="radio"> {{$pregunta->opcion3}}
                </label>

                <input value="{{$pregunta->correcta}}" name="correcta{{$key+1}}" hidden >
            </div>
             @endif

             @if ($key == 2)
             <div class=" float-left ml-5 ">
                <label class="text-xl font-bold">{{$key+1}}. {{$pregunta->pregunta}}</label><br>
                <label class="mx-2 ">
                    <input  value="{{$pregunta->opcion1}}" name="resp7" type="radio"> {{$pregunta->opcion1}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion2}}" name="resp8" type="radio"> {{$pregunta->opcion2}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion3}}" name="resp9" type="radio"> {{$pregunta->opcion3}}
                </label>

                <input value="{{$pregunta->correcta}}" name="correcta{{$key+1}}" hidden >
            </div>
             @endif

             @if ($key == 3)
             <div class=" float-left ml-5 ">
                <label class="text-xl font-bold">{{$key+1}}. {{$pregunta->pregunta}}</label><br>
                <label class="mx-2 ">
                    <input  value="{{$pregunta->opcion1}}" name="resp10" type="radio"> {{$pregunta->opcion1}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion2}}" name="resp11" type="radio"> {{$pregunta->opcion2}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion3}}" name="resp12" type="radio"> {{$pregunta->opcion3}}
                </label>

                <input value="{{$pregunta->correcta}}" name="correcta{{$key+1}}" hidden >
            </div>
             @endif
 
            
             @if ($key == 4)
             <div class=" float-left ml-5 ">
                <label class="text-xl font-bold">{{$key+1}}. {{$pregunta->pregunta}}</label><br>
                <label class="mx-2 ">
                    <input  value="{{$pregunta->opcion1}}" name="resp13" type="radio"> {{$pregunta->opcion1}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion2}}" name="resp14" type="radio"> {{$pregunta->opcion2}}
                </label><br>
                <label class="mx-2">
                    <input  value="{{$pregunta->opcion3}}" name="resp15" type="radio"> {{$pregunta->opcion3}}
                </label>

                <input value="{{$pregunta->correcta}}" name="correcta{{$key+1}}" hidden >
            </div>
             @endif
             <br><br>
             <hr class="w-full"> 
            @endforeach
            
      </div>
  </form>
    
@endsection