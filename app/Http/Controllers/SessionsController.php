<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
   public function create(){
       return view('auth.login');
   }

   public function store(){

       if(auth()->attempt(request(['email','password']))==false){
           return back()->withErrors([
            'message'=> 'El usuario o la contraseña son incorrectos, Intenta de nuevo',
           ]);
       }else{

        if(auth()->user()->tipoUsuario=='Alumno'){
            return redirect()->to('/alumno');
        }
        if(auth()->user()->tipoUsuario=='Docente'){
            return redirect()->to('/docente');
        }
        
       }
    //    return redirect()->to('/');
   }

   public function destroy(){
       auth()->logout();
       return redirect()->to('/');
   }
}
