<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- tailwind-->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    {{-- icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
  
    <nav class="flex py-5 bg-gray-700 text-white">
        
        <ul class="w-full px-16 ml-auto flex justify-between pt-2 ">

            @if(auth()->check())

            @if (auth()->user()->tipoUsuario=='Alumno')
            <li class="mx-6">
                <p class="text-xl"><b>{{auth()->user()->name}}</b></p>
            </li>   
                <li class="mx-6">
                    <a href="{{route('alumno.index')}}" class="font-semilbold hover:bg-gray-400 py-3 px-4 rounded-md">Alumno</a>
                </li>
                <li class="mx-6">
                    <a href="{{route('alumno.show')}}" class="font-semilbold hover:bg-gray-400 py-3 px-4 rounded-md">Examenes</a>
                </li>
                <li class="mx-6">
                    <a href="{{route('alumno.resultados')}}" class="font-semilbold hover:bg-gray-400 py-3 px-4 rounded-md">Resultados</a>
                </li>
                
                <li class="">
                    <a href="{{route('login.destroy')}}" class="font-bold py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Salir</a>
                </li>
                 
            @else
            <li class="mx-6">
                <p class="text-xl"><b>{{auth()->user()->name}}</b></p>
            </li>
            <li class="mx-6">
                <a href="{{route('docente.index')}}" class="font-semilbold hover:bg-gray-400 py-3 px-4 rounded-md">Docente</a>
            </li>
            <li class="mx-6">
                <a href="{{route('docente.show')}}" class="font-semilbold hover:bg-gray-400 py-3 px-4 rounded-md">Examenes</a>
            </li>
            <li class="mx-6">
                <a href="{{route('docente.resultados')}}" class="font-semilbold hover:bg-gray-400 py-3 px-4 rounded-md">Resultados</a>
            </li>
            
            <li class="">
                <a href="{{route('login.destroy')}}" class="font-bold py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Salir</a>
            </li>
            @endif
           @else
            
            <li class="mx-6">
                <a href="{{route('login.index')}}" class="font-semibold border-2 border white py-2 px-4 rounded-md hover:bg-white hover:text-indigo-700">Iniciar Sesion</a>
            </li>
            <li>
                <a href="{{route('register.index')}}" class="font-semibold border-2 border white py-2 px-4 rounded-md hover:bg-white hover:text-indigo-700">Registrar</a>
            </li>
           
           @endif

           
        </ul>
    </nav>

     @yield('content')
    
 </body>
</html>