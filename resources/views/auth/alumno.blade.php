@extends('layouts.app')

@section('title','Alumno')

@section('content')

<div class="mx-auto my-12 p-8 gb-white w-1/2 rounded-lg rouded-full">
    
    <div class="mb-8 ">
        <h1 class="text-5xl text-white text-center pt-24 absolute ml-19 pl-10"> Bienvenido {{auth()->user()->name}}</h1>
        <img src="{{ asset('imagenes/2.jpg') }}" alt="mi foto">
    </div>
        
</div> 

@endsection