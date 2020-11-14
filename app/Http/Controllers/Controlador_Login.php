<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Modelo;
use App\Models\Usuario;
use App\User;

class Controlador_Login extends Controller
{
   


    public function login(Request $req)
    {
        $email = $req->email;
        $senha = $req->password;  

        $user = User::where('email', $email)
                    ->first(); // buscando um registro desse pontuário

        //$tipo = $user->type;
        
        if ($user && Hash::check($senha, $user->password)) // encontrou o usuário
        {
            $tipo = $user->type;
            switch($tipo)
            {
                case 1:
                    Auth::login($user);
                    return \redirect()->intended('perfil-pf');
                break;
                case 2:
                    Auth::login($user);
                    return \redirect()->route('site.perfilPJ');
                break;
            }
            
        }
        else
        {
        return Redirect::to('/')->withErrors('Prontuario ou senha inválidos!');
        }
                
            }
}
