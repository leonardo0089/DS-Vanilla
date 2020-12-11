<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Modelo;
use App\Models\Usuario;
use App\User;
use App\Http\Controllers\FuncoesPJ;

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
            $error = false;
            $f = new FuncoesPJ();
            $tipo = $user->type;
            switch($tipo)
            {
                case 1:
                    Auth::login($user);
                    $f->initChat($req);
                    return \redirect()->route('site.perfilPF');
                break;
                case 2:
                    Auth::login($user);
                    $f->initChat($req);
                    return \redirect()->route('dash.perfil');
                break;
            }
            
        }else
        {
            $error = true;
            $msg = "Endereço de E-mail ou Senha estão errados";
            return view('loginG',
            [
                'error'=> $error,
                'eMsg' => $msg
            ]);
        }
                
    }
}
