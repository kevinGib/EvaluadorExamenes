@extends('layouts.app')

@section('title','Calificacion')

@section('content')

<div class="w-2/4 h-3/4 bg-white flow-root mt-8 m-auto">
    <div class="border border-2px h-10 bg-white text-center flow-root">
        <label class="font-bold ml-2 text-2xl text-center">Tu resultado</label>
        <a  href="{{route('alumno.show')}}" class="float-right mt-1 ml-1">  <i class="material-icons">cancel</i></a>
    </div>

    @if($correctas== 0 )
    <div class="m-auto w-2/4">
        <h2>tu resultado es 0</h2>
    </div>
    @endif

    @if($correctas== 1 )
    <div class="m-auto w-2/4">
        <img src="{{asset('score/1.jpg')}}" alt="" width="200" height="200">
    </div>
    @endif
    @if($correctas== 2 )
    <div class="m-auto w-2/4">
        <img src="{{asset('score/2.jpg')}}" alt="" width="200" height="200">
    </div>
    @endif
    @if($correctas== 3 )
    <div class="m-auto w-2/4">
        <img src="{{asset('score/3.jpg')}}" alt="" width="400" height="200">
    </div>
    @endif
    @if($correctas== 4 )
    <div class="m-auto w-2/4">
        <img src="{{asset('score/4.jpg')}}" alt="" width="200" height="200"> 
    </div>
    @endif
    @if($correctas== 5 )
    <div class="m-auto w-2/4">
        <img src="{{asset('score/5.jpg')}}" alt="" width="200" height="200">
    </div>
    @endif
       
   
  </div>

@endsection