<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados PDF</title>
    
</head>

<style>
    .color{
        color:white;
        font-weight: bold;
        
    }

    td, th {border-left: solid 1px black}
    table {
  table-layout: fixed;
  width: 100%;
  border-collapse: collapse;
  border-collapse: separate;
  border: 3px solid black;
  
  
}

thead th:nth-child(1) {
  width: 20%;
  background-color: rgba(14, 6, 158, 0.911);
}

thead th:nth-child(2) {
  width: 20%;
  background-color: rgba(14, 6, 158, 0.911);
}


thead th:nth-child(3) {
  width: 20%;
  background-color: rgba(14, 6, 158, 0.911);
}

thead th:nth-child(4) {
  width: 20%;
  background-color: rgba(14, 6, 158, 0.911);
}


thead th:nth-child(5) {
  width: 20%;
  background-color: rgba(14, 6, 158, 0.911);
}
thead th:nth-child(6) {
  width: 20%;
  background-color: rgba(14, 6, 158, 0.911);
}

thead th:nth-child(7) {
  width: 20%;
  background-color: rgba(14, 6, 158, 0.911);
}
th, td {
  padding: 10px;
}

.divTitulo{
    text-align: center;
    border: 3px solid black;
    height:20;
    color:black;
    background-color: white;
}

.titulo{
    text-align: center;
    font-size: 16px;
 
}

.columna{
    background-color: skyblue;
}
</style>
<body>
    <div>
        <div class="divTitulo">
            <label class="titulo">Resultados</label> 
        </div>
        <table class="table" >
         <thead class="color">
            <tr>
                <th>Id Resultado</th>    
                <th>Examen</th>
                <th>Id Docente</th>
                <th>Id Alumno</th>
                <th>Alumno</th>
                <th>Intentos</th>
                <th>promedio</th>
            </tr>
        </thead>
        <tbody class="table">
                   
            @foreach ($resultados as $item)
            
                <tr>
                    <th class="columna">
                     {{$item->id}}
                    </th>
                    <th >
                     {{$item->Examen}}
                    </th>
                    <th class="columna">
                     {{$item->idDocente}}
                    </th>
                    <th >
                      {{$item->idAlumno}}
                     </th>
                    <th class="columna">
                     {{$item->nombreAlumno}}
                    </th>
                    <th >
                     {{$item->intentos}}
                    </th>
                    <th class="columna" >
                     {{$item->promedio}}
                    </th>
                </tr>
            @endforeach
            
        </tbody>

    </table>

    <br><br>

    <div class="divTitulo">
      <label class="titulo">Detalle resultados</label> 
  </div>
  <table class="table" >
   <thead class="color">
      <tr>
          <th>Id Resultado</th>
          <th>Id Docente</th>
          <th>Id Examen</th>
          <th>Examen</th>
          <th>Calificacion</th>
          
      </tr>
  </thead>
  <tbody class="table">
             
    @foreach ($calificaciones as $item)
      
          <tr>
              <th class="columna">
                {{$item->idResultado}}
              </th>
              <th >
                {{$item->idDocente}}
               </th>
              <th class="columna">
                {{$item->idExamen}}
              </th>
              <th >
                {{$item->Examen}}
              </th>
              <th class="columna">
                {{$item->calificacion}}
              </th>
              
          </tr>
      @endforeach
      
  </tbody>

</table>
  </div>
   
</body>
</html>

