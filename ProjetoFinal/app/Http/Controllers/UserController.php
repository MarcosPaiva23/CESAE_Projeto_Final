<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //retorna a view de registro
    public function viewRegister(){
        return view('auth.register');
    }

    //cria um novo utilizador
    public function createUser(Request $request){
        //validação dos dados
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //criar um novo utilizador
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        //guardar o utilizador
        $user->save();

        //redirecionar para a página de login
        return redirect()->route('login');
    }


}
