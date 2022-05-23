@extends('layouts.app')

@section('title','Examenes')

@section('content')

    <div class="w-2/4 bg-blue-300 h-3/4 m-auto shadow rounded mt-8 flow-root">
        <div class="border border-2px h-10 bg-white text-center">
            <label class="font-bold ml-2 text-2xl text-center"> Tus Examenes</label>
            
            <a href="{{route('docente.crearexamen')}}"> <button class="hover:bg-blue-300 float-right shadow rounded bg-gray-300 mt-1 mr-2 py-1 px-7">Agregar</button></a>
        </div>
        {{-- contenido de los examenes --}}
        
            @foreach ($examenes as $examen)
               <div class="mb-5 mt-5" >
                <div class="text-2xl font-bold float-left ml-5 ">
                    {{$examen->titulo}}     
                </div>
               
                <form action="{{route('docente.destroy',$examen)}}"  class="eliminar" method="POST">
                    @csrf
                    @method('delete')
                    <div>
                        <button  type='submit' class="hover:bg-blue-50 shadow rounded bg-gray-300 mb-5 mt-1 mr-2 py-1 px-7 float-right">Eliminar</button>
                    </div>
                </form>
                <div>
                    <a href="{{route('docente.editarexamen', $examen->idExamen)}}"> <button class="hover:bg-blue-50 shadow rounded bg-gray-300 mb-5 mt-1 mr-2 py-1 px-7 float-right">Modificar</button></a>
                </div>
               </div>
               
                <br><br>
                <hr class="w-full">
            @endforeach

        
    </div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@if (session('agregado')=='agregado')    
<script>
   
    Swal.fire(
    'Creado!',
    'Se creo correctamente el examen',
    'success'
);
</script> 
@endif


@if (session('eliminar')=='eliminado')    
<script>
   
    Swal.fire(
    'Eliminado!',
    'El examen y preguntas fueron eliminados',
    'success'
);
</script> 
@endif


<script>
    $('.eliminar').submit(function(e){
        e.preventDefault();
   
  Swal.fire({
  title: 'Estas seguro de eliminar?',
  text: "Esta accion es irreversible",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, quiero eliminarlo',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
       this.submit();
  }
})
});
</script>

@endsection

