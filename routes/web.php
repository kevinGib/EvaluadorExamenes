<?php

use App\Http\Controllers\homeAlumnoController;
use App\Http\Controllers\homeDocenteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

// -----------------------------------Ruta Inicio----------------------------------------
Route::get('/', function () {
    return view('/home');
})->middleware('auth');

// -----------------------------------Rutas Registro-------------------------------------
Route::get('/register',[RegisterController::class,'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register',[RegisterController::class,'store'])
    ->name('register.store');

// -----------------------------------Rutas Inicio de sesion----------------------------
Route::get('/login', [SessionsController::class,'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login',[SessionsController::class,'store'])
    ->name('login.store');

Route::get('/logout',[SessionsController::class,'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

// -----------------------------------Rutas Alumno---------------------------------------- 
    Route::get('/alumno',[homeAlumnoController::class,'index'])
    ->name('alumno.index') 
    ->middleware('auth.alumno');

    Route::get('/alumno/examenes',[homeAlumnoController::class,'show'])
    ->name('alumno.show')
    ->middleware('auth.alumno');

    Route::get('/alumno/verexamen/{id}',[homeAlumnoController::class,'verexamen'])
    ->name('alumno.verexamen')
    ->middleware('auth.alumno');

    Route::post('/alumno/respuestas',[homeAlumnoController::class,'respuestas'])
    ->name('alumno.respuestas')
    ->middleware('auth.alumno');

    Route::get('/alumno/resultados',[homeAlumnoController::class,'resultados'])
    ->name('alumno.resultados')
    ->middleware('auth.alumno');

    Route::get('/alumno/resultados/pdf',[homeAlumnoController::class,'pdfAlumno'])
    ->name('alumno.pdfAlumno')
    ->middleware('auth.alumno');


// -----------------------------------Rutas Docente--------------------------------------  
    Route::get('/docente',[homeDocenteController::class,'index'])
    ->name('docente.index')
    ->middleware('auth.docente');
    
    Route::get('/docente/examenes',[homeDocenteController::class,'show'])
    ->name('docente.show')
    ->middleware('auth.docente');

    Route::delete('/docente/examenes/{id}',[homeDocenteController::class,'destroy'])
    ->name('docente.destroy')
    ->middleware('auth.docente');

    Route::get('/docente/crearexamen',[homeDocenteController::class,'crearexamen'])
    ->name('docente.crearexamen')
    ->middleware('auth.docente');

    Route::post('/docente/crearexamen',[homeDocenteController::class,'guardarexamen'])
    ->name('docente.guardarexamen')
    ->middleware('auth.docente');

    Route::get('/docente/crearpregunta',[homeDocenteController::class,'crearpregunta'])
    ->name('docente.crearpregunta')
    ->middleware('auth.docente');

    Route::post('/docente/crearpregunta',[homeDocenteController::class,'guardarpregunta'])
    ->name('docente.guardarpregunta')
    ->middleware('auth.docente');

    Route::get('/docente/editarexamen/{id}',[homeDocenteController::class,'editarexamen'])
    ->name('docente.editarexamen')
    ->middleware('auth.docente');

    Route::delete('/docente/editarexamen/eliminarpregunta/{id}',[homeDocenteController::class,'eliminarpregunta'])
    ->name('docente.eliminarpregunta')
    ->middleware('auth.docente');
    
    Route::get('/docente/editarexamen/agregarnuevapregunta/{id}',[homeDocenteController::class,'agregarnuevapregunta'])
    ->name('docente.agregarnuevapregunta')
    ->middleware('auth.docente');

    Route::post('/docente/editarexamen/agregarnuevapregunta',[homeDocenteController::class,'guardarnuevapregunta'])
    ->name('docente.guardarnuevapregunta')
    ->middleware('auth.docente');

    Route::get('/docente/editarexamen/editarpregunta/{id}',[homeDocenteController::class,'editarpregunta'])
    ->name('docente.editarpregunta')
    ->middleware('auth.docente');
    
    Route::put('/docente/editarexamen/editarpregunta/{pregunta}',[homeDocenteController::class,'guardarpreguntaeditada'])
    ->name('docente.guardarpreguntaeditada')
    ->middleware('auth.docente');

    Route::get('/docente/resultados',[homeDocenteController::class,'resultados'])
    ->name('docente.resultados')
    ->middleware('auth.docente');

    Route::get('/docente/resultados/pdf',[homeDocenteController::class,'pdfDocente'])
    ->name('docente.pdfDocente')
    ->middleware('auth.docente');
   