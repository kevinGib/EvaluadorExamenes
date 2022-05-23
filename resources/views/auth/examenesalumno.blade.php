@extends('layouts.app')

@section('title','Examenes')

@section('content')

    <div class="w-2/4 bg-blue-300 h-3/4 m-auto shadow rounded mt-8 flow-root">
        <div class="border border-2px h-10 bg-white text-center">
            <label class="font-bold ml-2 text-2xl text-center"> Tus Examenes</label>
        </div>
        {{-- contenido de los examenes --}}
        
            @foreach ($examenes as $examen)
               <div class="mb-5 mt-3" >
                   <p>Docente: {{$examen->users->name}}</p>
                <div class="text-2xl font-bold float-left ml-5 ">
                    {{$examen->titulo}}     
                </div>
               
                <div>
                    <a href="{{route('alumno.verexamen', $examen)}}"> <button class="hover:bg-blue-50 shadow rounded bg-gray-300 mb-5 mt-1 mr-2 py-1 px-7 float-right">Ver examen</button></a>
                </div>
               </div>
               
                <br><br>
                <hr class="w-full" size="16px">

            @endforeach

            @error('error')
               <input name="cantidad" value="{{$message}}" hidden id="idError">
            @enderror

        
    </div>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


@if (session('examen')=='error')    
<script>
   var cantidad=$('#idError').val();
    Swal.fire(
    'Error al abrir el examen!',
    'El examen no esta disponible no tiene suficientes preguntas, tiene '+cantidad+' preguntas' ,
    'error'
);
</script> 
@endif

@endsection

