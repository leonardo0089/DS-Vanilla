<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class ViewsMake extends Controller
{
    public function perfil(Request $req)
    {
        if(Auth::check() === true){
            $varr = $this->carregaFoto($req);
            
            foreach($varr as $chave)
            {
                $ft = $chave->foto;
            }

            $data = $this->getSession($req);
            $id = Auth::id();
            //$foto = DB::table('curriculo')->where('fk_id_pf',$id)->value('foto');
           foreach($data as $key)
            {
                $v = $key->nome_sobrenome;
                $diasPremium = $key->dias_premium;
            }
            return view('perfilPF', 
            [
                'ds' => $v,
                'dias' => $diasPremium,
                'foto' => $ft
            ]);
        }else
        {
           return \redirect()->route('site.login');
        }

    }

    public function getSession(Request $request)
    {
        $id = Auth::id();
        $pesq = DB::select('select * from usuario_pf as pf inner join users as u on pf.fk_id_usuario = u.id where u.id = :id',
        [
            'id' => $id
        ]);

        //$request->session()->put('id_session', random_int(1,999));
        //$data =  $request->session()->all();
        return $pesq;
    }


    public function carregaFoto(Request $req)
    {
        $id = Auth::id();
        $s = $req->session()->get('id');
        $foto = DB::select('select foto from curriculo as c 
        inner join usuario_pf as pf 
        on c.fk_id_pf = pf.id_pf 
        inner join users as u 
        on u.id = pf.fk_id_usuario where u.id = :id',
        [
            'id' => $id
        ]);
        return $foto;
    }


    public function curriculoPercent()
    {
        $id = Auth::id();

        $pesq = DB::select('select * from usuario_pf as pf 
        inner join curriculo as cur on (pf.id_pf = cur.fk_id_pf)
        inner join experiencias as exxp on (cur.id_curriculo = exxp.fk_id_curriculo_exp)
        inner join formacao as form on (cur.id_curriculo = form.fk_curriculo)
        inner join redes_sociais as rs on (cur.id_curriculo = rs.fk_curriculo) where pf.fk_id_usuario = :id',
        [
            'id' => $id
        ]);
    }




    public function logout()
    {
        Auth::logout();
        Session::flush();
        return \redirect()->route('site.login');
    }
}
