<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){

        $this->validate(request(),[
            'name'=>'required',
            'usuario'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = User::create(request(['name','usuario','email','tipoUsuario','password']));

        auth()->login($user);
        // return redirect()->to('/');

        if(auth()->user()->tipoUsuario=='Alumno'){
            return redirect()->to('/alumno');
        }
        
        if(auth()->user()->tipoUsuario=='Docente'){
            return redirect()->to('/docente');
        }

        
    }


}
