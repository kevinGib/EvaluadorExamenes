<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use Illuminate\Http\Request;
use App\Models\Examenes;
use App\Models\Pregunta;
use App\Models\Resultadosexamenes;
use Illuminate\Support\Facades\App;

class homeAlumnoController extends Controller
{
   public function index(){
       return view ('auth.alumno');
   }

   public function show(){
    $examenes=Examenes::all();
    return view ('auth.examenesalumno',compact('examenes'));
    }

    public function verexamen($id){
       
        $examen=Pregunta::where('idExamen', $id)->inRandomOrder()->limit(5)->get();
        $examenes=Examenes::all()->where('idExamen', $id);

        $listapregunta = Pregunta::all()->where('idExamen',$id);
        $cantidad=count($listapregunta);
        if(count($listapregunta)<5){
            return back()->withErrors([
                'error' => $cantidad,
            ])->with('examen','error');
        }

        return view ('auth.verexamen', compact('examen','examenes'));
    }


    
    public function respuestas(Request $request){
        $correctas=0;
        $calificacion=0;
        
        $resp1 = "";
        $resp2 = "";
        $resp3 = "";
        $resp4 = "";
        $resp5 = "";

        if($request->resp1 != ""){
            $resp1 = $resp1.$request->resp1;
        }

        if($request->resp2 != ""){
            $resp1 = $resp1.','.$request->resp2;
        }

        if($request->resp3 != ""){
            $resp1 = $resp1.','.$request->resp3;
        }

        if($resp1 == $request->correcta1){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }

        //------------------------------------
        if($request->resp4 != ""){
            $resp2 = $resp2.$request->resp4;
        }

        if($request->resp5 != ""){
            $resp2 = $resp2.','.$request->resp5;
        }

        if($request->resp6 != ""){
            $resp2 = $resp2.','.$request->resp6;
        }

        if($resp2 == $request->correcta2){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }

        //---------------------------------------

        if($request->resp7 != ""){
            $resp3 = $resp3.$request->resp7;
        }

        if($request->resp8 != ""){
            $resp3 = $resp3.','.$request->resp8;
        }

        if($request->resp9 != ""){
            $resp3 = $resp3.','.$request->resp9;
        }

        if($resp3 == $request->correcta3){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }

        //--------------------------------------

        if($request->resp10 != ""){
            $resp4 = $resp4.$request->resp10;
        }

        if($request->resp11 != ""){
            $resp4 = $resp4.','.$request->resp11;
        }

        if($request->resp12 != ""){
            $resp4 = $resp4.','.$request->resp12;
        }

        if($resp4 == $request->correcta4){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }
        

        //----------------------------------------
        if($request->resp13 != ""){
            $resp5 = $resp5.$request->resp13;
        }

        if($request->resp14 != ""){
            $resp5 = $resp5.','.$request->resp14;
        }

        if($request->resp15 != ""){
            $resp5 = $resp5.','.$request->resp15;
        }

        if($resp5 == $request->correcta5){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }
        //comparamos que si un alumno ya contesto ese mismo examen
        if(Resultadosexamenes::where('idExamen', $request->idExamen) 
        ->where('idAlumno', auth()->user()->id)->exists()){
           
            $datosCalificacion=0;

            $resultados= Resultadosexamenes::where('idExamen', $request->idExamen) 
            ->where('idAlumno', auth()->user()->id)->get();
            foreach ($resultados as $key => $value) {
               $intento = $value->intentos;
               $idResultados = $value->id;
            }

            $calificaciones = new Calificaciones();
            $calificaciones->idResultado=$idResultados;
            //---------
            $calificaciones->idExamen=$request->idExamen;
            $calificaciones->Examen=$request->Examen;
            //----------
            $calificaciones->idDocente=$request->idDocente;
            $calificaciones->idAlumno=auth()->user()->id;
            $calificaciones->calificacion=$calificacion;

            $calificaciones->save();

            $obtenerCalificacion =  Calificaciones::where('idResultado',$idResultados)->get();

            foreach ($obtenerCalificacion  as $key => $value) {
               
                $datosCalificacion+= $value->calificacion;
             }

             $intento++;
             $promedio=$datosCalificacion/$intento;

             $resultados= Resultadosexamenes::find($idResultados);
             $resultados->idExamen=$request->idExamen;
             $resultados->examen=$request->Examen;
             $resultados->idDocente=$request->idDocente;
             $resultados->idAlumno=auth()->user()->id;
             $resultados->nombreAlumno=$request->nombreUsuario;
             $resultados->intentos=$intento;
             $resultados->promedio=$promedio;
             
             $resultados->save();
 

        }else{
            $resultados= new Resultadosexamenes();
            $resultados->idExamen=$request->idExamen;
            $resultados->examen=$request->Examen;
            $resultados->idDocente=$request->idDocente;
            $resultados->idAlumno=auth()->user()->id;
            $resultados->nombreAlumno=$request->nombreUsuario;
            $resultados->intentos=1;
            $resultados->promedio=$calificacion;
            
            $resultados->save();

            $resultado=$resultados->id;
            
            $calificaciones= new Calificaciones();
            $calificaciones->idResultado=$resultado;
            //---
            $calificaciones->idExamen=$request->idExamen;
            $calificaciones->Examen=$request->Examen;
            //---
            $calificaciones->idDocente=$request->idDocente;
            $calificaciones->idAlumno=auth()->user()->id;
            $calificaciones->calificacion=$calificacion;

            $calificaciones->save();

            

        }
        
        // $examenes=Examenes::all();
        // return view ('auth.examenesalumno',compact('examenes'));
        return view ('auth.vistacalificacion',compact('correctas'));
        

    }


    public function resultados(){
        $resultados =  Resultadosexamenes::where('idAlumno',auth()->user()->id)->get();
        $calificaciones =  Calificaciones::where('idAlumno',auth()->user()->id)->get();
        
        return view ('auth.resultados', compact('resultados','calificaciones'));

    }

    


    public function pdfAlumno(){
        $resultados =  Resultadosexamenes::where('idAlumno',auth()->user()->id)->get();
        $calificaciones =  Calificaciones::where('idAlumno',auth()->user()->id)->get();

        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("auth.pdfAlumno", compact('resultados','calificaciones'))->setOptions(['defaultFont' => 'sans-serif']);
        return $dompdf->stream();//permitiendo descargargar
        // return $dompdf->download("reporte.pdf");//descarga automatica
       
    }
}
