<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\Examenes;
use App\Models\Pregunta;
use App\Models\Resultadosexamenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rules\Exists;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Str;
use Validator;


class homeDocenteController extends Controller
{
    public function index(){
        return view ('auth.docente');
    }

    public function show(){
        $idUsuario=auth()->user()->id;
        $examenes=Examenes::all()->where('id_user',$idUsuario);
        return view ('auth.examenesdocente',compact('examenes'));
        

    }

    public function crearexamen(){
       
        return view ('auth.crearexamen');
    }

    public function guardarexamen(Request $request){

        $this->validate(request(),[
            'titulo'=>'required',
            
        ]);
        
        function quitar_acentos($cadena){
            $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿÑñ';
            $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
            $cadena = utf8_decode($cadena);
            $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
            return utf8_encode($cadena);
        }

        if(Examenes::where(quitar_acentos(Str::upper('titulo')),quitar_acentos(Str::upper($request->titulo)))->where('id_user',auth()->user()->id)->exists()){
            return back()->withErrors([
                'message'=> 'Examen ya existente intente con otro nombre',
               ]);
        }

        $examen=new Examenes();
        $examen->titulo=$request->titulo; 
        $examen->id_user=auth()->user()->id;
        $examen->save();
        $idExamen=$examen->idExamen;

        return view('auth.crearpreguntas', compact('idExamen'));

        
    }


    
    public function crearpregunta(){
        return view('auth.crearpreguntas');
    }

    public function guardarpregunta(Request $request){
        $respuestacorrecta="";
        
        // $pregunta->correcta=$request->correcta;
        //radio button con una opcion
        // if($request->correcta=='1'){
        //     $respuestacorrecta=$request->opcion1;
        // }
        // if($request->correcta=='2'){
        //     $respuestacorrecta=$request->opcion2;
        // }
        // if($request->correcta=='3'){
        //     $respuestacorrecta=$request->opcion3;
        // }
        // $pregunta->correcta=$respuestacorrecta;
        //----------------------

        $pregunta=new Pregunta();
              //radio button con varias opciones
        $correcta1="";
        if($request->res1 != "" && $request->res1 == 1){
            $correcta1 = $request->opcion1;
        }
        if($request->res2 != "" && $request->res2 == 2){
            $correcta1 = $correcta1.','. $request->opcion2;
        }
        if($request->res3 != "" && $request->res3 == 3){
            $correcta1 = $correcta1.','. $request->opcion3;
        }
       
        $pregunta->pregunta=$request->pregunta;
        $pregunta->opcion1=$request->opcion1;
        $pregunta->opcion2=$request->opcion2;
        $pregunta->opcion3=$request->opcion3;
        $pregunta->correcta=$correcta1;

        $pregunta->idExamen=$request->idExamen;
        $pregunta->save();
        $idExamen=$pregunta->idExamen;
        return view('auth.crearpreguntas', compact('idExamen'));

        
        
    }

    //eliminar examen
    public function destroy($id){
        $examen=Examenes::find($id);
        $examen->delete();
        
        $idUsuario=auth()->user()->id;
        $examenes=Examenes::all()->where('id_user',$idUsuario);
        // return view ('auth.examenesdocente',compact('examenes'));
        return redirect()->route('docente.show',['examenes'=>$examenes])->with('eliminar','eliminado');
    }

    public function editarexamen($id){
        $examen=Pregunta::all()->where('idExamen', $id);
        $examenes=Examenes::all()->where('idExamen', $id);
        return view ('auth.editarexamen', compact('examen','examenes'));
    }


    public function eliminarpregunta($id){
        $pregunta=Pregunta::find($id);
        $idExamen=$pregunta->idExamen;

        $examen = Examenes::all()->where('id',$id);
        $listapregunta = Pregunta::all()->where('idExamen',$id);
        if(count($listapregunta)<=5){
            $examen=Pregunta::all()->where('idExamen', $idExamen);
             $examenes=Examenes::all()->where('idExamen', $idExamen);
            return redirect()->route('docente.editarexamen',['examen'=>$examen,'examenes'=>$examenes,$idExamen ])->with('eliminar','no_eliminado'); 
        }else{
            $pregunta->delete();
            $examen=Pregunta::all()->where('idExamen', $idExamen);
            $examenes=Examenes::all()->where('idExamen', $idExamen);
            // return view ('auth.editarexamen', compact('examen','examenes'));
            return redirect()->route('docente.editarexamen',['examen'=>$examen,'examenes'=>$examenes,$idExamen ])->with('eliminar','eliminada');
        }
       

       
    }


    public function agregarnuevapregunta($id){
        $idExamen=$id;
        return view('auth.nuevapregunta', compact('idExamen'));
    }

    
    //guardar una nueva pregunta
    public function guardarnuevapregunta(Request $request){

        $request->validate([
        'pregunta'=>'required',
        'opcion1'=>'required',
        'opcion2'=>'required',
        'opcion3'=>'required'
        ]);

        $respuestacorrecta="";
        $pregunta=new Pregunta();
        $pregunta->pregunta=$request->pregunta;
        $pregunta->opcion1=$request->opcion1;
        $pregunta->opcion2=$request->opcion2;
        $pregunta->opcion3=$request->opcion3;
       

        $pregunta=new Pregunta();
        //radio button con varias opciones
        $correcta1="";
        if($request->res1 != "" && $request->res1 == 1){
             $correcta1 = $request->opcion1;
        }
        if($request->res2 != "" && $request->res2 == 2){
            $correcta1 = $correcta1.','. $request->opcion2;
        }
        if($request->res3 != "" && $request->res3 == 3){
             $correcta1 = $correcta1.','. $request->opcion3;
            }
 
            $pregunta->pregunta=$request->pregunta;
            $pregunta->opcion1=$request->opcion1;
            $pregunta->opcion2=$request->opcion2;
            $pregunta->opcion3=$request->opcion3;
            $pregunta->correcta=$correcta1;

        $pregunta->idExamen=$request->idExamen;

        $pregunta->save();
        //$idExamen=$pregunta->idExamen;
        // return view('auth.nuevapregunta', compact('idExamen'));
       
        $idExamen=$pregunta->idExamen;
        $examen=Pregunta::all()->where('idExamen', $idExamen);
        $examenes=Examenes::all()->where('idExamen', $idExamen);

        //retorno para regresar a las preguntas
        // return redirect()->route('docente.editarexamen',['examen'=>$examen, 'examenes'=>$examenes,$idExamen])->with('agregar','agregada');

        //retorno para crear otra pregunta
        return redirect()->route('docente.agregarnuevapregunta',['examen'=>$examen, 'examenes'=>$examenes,$idExamen])->with('agregar','agregada');
    }

    public function editarpregunta($id){
        $idPregunta=$id;
        $pregunta=Pregunta::all()->where('idPregunta', $idPregunta);
        return view('auth.editarpregunta',compact('pregunta'));

    }

    public function guardarpreguntaeditada(Request $request, Pregunta $pregunta){
        
        $request->validate([
            'pregunta'=>'required',
            'opcion1'=>'required',
            'opcion2'=>'required',
            'opcion3'=>'required'
            ]);

        $respuestacorrecta="";
        $pregunta->pregunta=$request->pregunta;
        $pregunta->opcion1=$request->opcion1;
        $pregunta->opcion2=$request->opcion2;
        $pregunta->opcion3=$request->opcion3;
        if($request->correcta=='1'){
            $respuestacorrecta=$request->opcion1;
        }else if($request->correcta=='2'){
            $respuestacorrecta=$request->opcion2;
        }else if($request->correcta=='3'){
            $respuestacorrecta=$request->opcion3;
        }else{
            $respuestacorrecta=$request->correcta;
        }
        //  $pregunta->correcta=$request->correcta;
        $pregunta->correcta=$respuestacorrecta;
        $pregunta->idExamen=$request->idExamen;
        $pregunta->save();
        
        $idExamen=$pregunta->idExamen;
        $examen=Pregunta::all()->where('idExamen', $idExamen);
        $examenes=Examenes::all()->where('idExamen', $idExamen);
        // return view ('auth.editarexamen', compact('examen','examenes'));
        return redirect()->route('docente.editarexamen',['examen'=>$examen, 'examenes'=>$examenes,$idExamen])->with('actualizar','actualizado');

    }

    public function resultados(){
         $idDocente = auth()->user()->id;
         $resultados= Resultadosexamenes::all()->where('idDocente',$idDocente);
         $calificaciones = Calificaciones::all()->where('idDocente',$idDocente);
        return view ('auth.resultadosdocente', compact('resultados','calificaciones'));

    }

    public function pdfDocente(){
        $resultados =  Resultadosexamenes::where('idDocente',auth()->user()->id)->get();
        $calificaciones =  Calificaciones::where('idDocente',auth()->user()->id)->get();

        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("auth.pdfDocente", compact('resultados','calificaciones'))->setOptions(['defaultFont' => 'sans-serif']);
        return $dompdf->stream();//permitiendo descargargar
        // return $dompdf->download("reporte.pdf");//descarga automatica
       
    }
    
}
