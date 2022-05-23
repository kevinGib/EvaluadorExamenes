@extends('layouts.app')

@section('title','Resultados')

@section('content')

    <div class="w-3/4 bg-whit5 h-3/4 m-auto shadow rounded mt-8 flow-root">
        <div class="border border-2px h-10 bg-white text-center">
            <label class="font-bold ml-2 text-2xl text-center"> Resultados</label>
            <a href="{{route('docente.pdfDocente')}}"> <button class="hover:bg-blue-50 shadow rounded bg-gray-300 mb-5 mt-1 mr-2 py-1 px-7 float-right">PDF</button></a>
        </div>
       
        <table class="table w-full px-16 ml-auto flex justify-between pt-2 ">
           <thead>
            <tr>
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">
                    id Resultado </th>
                
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500 ">Examen </th>
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">
                    id Alumno </th>
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">Alumno</th>
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">Intentos</th>
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">Promedio</th>
              </tr>
           </thead>
           <div>
                <tbody>
               
               @foreach ($resultados as $item)
               
                   <tr>
                    <th class="border border-gray-400 px-2 py-2 bg-blue-200">
                        {{$item->id}}
                       </th>
                       <th class="border border-gray-400 px-2 py-2">
                        {{$item->Examen}}
                       </th>
                       <th class="border border-gray-400 px-2 py-2 bg-blue-200">
                        {{$item->idExamen}}
                       </th>
                       <th class="border border-gray-400 px-2 py-2 ">
                        {{$item->nombreAlumno}}
                       </th>
                       <th class="border border-gray-400 px-2 py-2 bg-blue-200">
                        {{$item->intentos}}
                       </th>
                       <th class="border border-gray-400 px-2 py-2 ">
                        {{$item->promedio}}
                       </th>
                   </tr>
               @endforeach
               
           </tbody>
           </div>
           
        </table>
        <br><br>
        <div class="border border-2px h-10 bg-white text-center">
            <label class="font-bold ml-2 text-2xl text-center">Detalle resultados</label>
        </div>

        <table class="table w-full px-16 ml-auto flex justify-between pt-2 ">
            <thead>
             <tr>
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">
                Id Resultado </th>
                {{-- <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">Id Alumno</th> --}}
                 <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">Id Alumno</th>

                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">
                Id Examen </th>
                <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">
                Examen </th>
                 
                 <th class="border border-gray-500 px-2 py-2 text-white bg-blue-500">Calificacion</th>
               </tr>
            </thead>
            <div>
                 <tbody>
                
                @foreach ($calificaciones as $item)
                
                    <tr>
                        <th class="border border-gray-400 px-2 py-2 bg-blue-200">
                         {{$item->idResultado}}
                        </th>
                        <th class="border border-gray-400 px-2 py-2">
                            {{$item->idAlumno}}
                           </th>
                           
                        <th class="border border-gray-400 px-2 py-2  bg-blue-200 ">
                            {{$item->idExamen}}
                        </th>
                        <th class="border border-gray-400 px-2 py-2">
                            {{$item->Examen}}
                         </th>
                           
                        <th class="border border-gray-400 px-2 py-2 bg-blue-200">
                         {{$item->calificacion}}
                        </th>
                        
                    </tr>
                @endforeach
                
            </tbody>
            </div>
            
         </table>
        
    </div>


@endsection