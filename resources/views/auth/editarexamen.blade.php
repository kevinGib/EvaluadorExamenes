@extends('layouts.app')

@section('title','Editar Examen')

@section('content')

  <div class="w-3/4 h-3/4 bg-blue-300 flow-root mt-8 m-auto">
    <div class="border border-2px h-10 bg-white text-center">
        @foreach ($examenes as $item)
        <label class="font-bold ml-2 text-2xl text-center">{{$item->titulo}}</label>
            
        <a href="{{route('docente.agregarnuevapregunta', $item->idExamen)}}"> <button class="hover:bg-blue-300 float-right shadow rounded bg-gray-300 mt-1 mr-2 py-1 px-7">Agregar</button></a>
        @endforeach
    </div>

 
        @foreach ($examen as $pregunta)
        <div class="mb-5 mt-5" >
            <div class="text-2xl font-bold float-left ml-5 ">
                <label class="text-xl font-serif"> {{$pregunta->pregunta}}</label>
            </div>
            <form action="{{route('docente.eliminarpregunta', $pregunta)}}" class="eliminarPregunta"  method="POST">
                @csrf
                @method('delete')
                <div>
                    <button  type='submit' class="hover:bg-blue-50 shadow rounded bg-gray-300 mb-5 mt-1 mr-2 py-1 px-7 float-right">Eliminar</button>
                </div>
            </form>
            <div>
                <a href="{{route('docente.editarpregunta',$pregunta)}}"> <button class="hover:bg-blue-50 shadow rounded bg-gray-300 mb-5 mt-1 mr-2 py-1 px-7 float-right">Modificar</button></a>
            </div>
         </div> 
         <br><br>
         <hr class="w-full"> 
        @endforeach
    
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@if (session('agregar')=='agregada')    
<script>
   
    Swal.fire(
    'Creada!',
    'Se creo correctamente la pregunta',
    'success'
);
</script> 
@endif


@if (session('eliminar')=='eliminada')    
<script>
   
    Swal.fire(
    'Eliminada!',
    'La pregunta fue eliminada',
    'success'
);
</script> 
@endif

@if (session('actualizar')=='actualizado')    
<script>
   
    Swal.fire(
    'Actualizada!',
    'La pregunta fue Actualizada',
    'success'
);
</script> 
@endif


@if (session('eliminar')=='no_eliminado')    
<script>
   
    Swal.fire(
    'Error!',
    'No puedes eliminar menos de 5 preguntas',
    'warning'
);
</script> 
@endif


<script>
    $('.eliminarPregunta').submit(function(e){
        e.preventDefault();
   
  Swal.fire({
  title: 'Estas seguro de eliminar la pregunta?',
  text: "Esta accion es irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, quiero eliminarla',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
  this.submit();
  }
})
});
</script>

    
@endsection