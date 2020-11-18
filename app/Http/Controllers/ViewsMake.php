<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Controllers\NovaVaga;
class ViewsMake extends Controller
{
    public function perfil(Request $req)
    {
        if(Auth::check() === true){
            $tipo = Auth::user();

            switch($tipo->type)
            {
                case 1:
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
                break;
                case 2:
                    $ft = $this->carregarFotoPJ($req);
                    //return dd($ft);

                    foreach($ft as $key2)
                    {
                        $nome = $key2->nome_fantasia;
                        $foto = $key2->foto;
                    }


                    return view('pj.perfilPJ',
                    [
                        'nome' => $nome,
                        'foto' => $foto,
                        'premium' => $tipo->dias_premium
                    ]);
                break;
            }
            
        }else
        {
           return \redirect()->route('site.login');
        }

        
        
        
    }
    
    public function alterarDadosView(Request $req)
    {
        if(Auth::check() === true)
        {
            $tipo = Auth::user();
            $ft = $this->carregarFotoPJ($req);
            foreach($ft as $key2)
            {
                $nome = $key2->nome_fantasia;
                $foto = $key2->foto;
            }
            $dados = DB::table('usuario_pj')->where('fk_id_usuario', $tipo->id)->get();

            foreach($dados as $key)
            {
                $endereco = $key->endereco;
                $estado = $key->estado;
                $cidade = $key->cidade;
                $cep = $key->cep;
                $cel = $key->cel;
                $tel_fixo = $key->tel_fixo;
                $tipo_contratacao = $key->tipo_contratacao;
                $tipo_empresa = $key->tipo_empresa;
                $sobre_empresa = $key->sobre_empresa;
                $receb_prop = $key->receb_prop;
            }

            return view('pj.cadastroPJ',
            [
                'nome' => $nome,
                'foto' => $foto,
                'premium' => $tipo->dias_premium,
                'end' => $endereco,
                'est' => $estado,
                'cid' => $cidade,
                'cep' => $cep,
                'cel' => $cel,
                'tf' => $tel_fixo,
                'tc' => $tipo_contratacao,
                'te' => $tipo_empresa,
                'se' => $sobre_empresa,
                'rp' => $receb_prop,
            ]);
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

    public function carregarFotoPJ(Request $request)
    {
        $id = Auth::id();
        $foto = DB::table('usuario_pj')->where('fk_id_usuario', $id)->get();
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

    //Carrega view nova Vaga

    public function novaVaga(Request $request)
    {
        $user = Auth::user();

       // dd($user);


        if(Auth::check() === true)
        {

            if($user->type == 2)
            {
                return view('postar-vagas-pj');
            }else
            {
                return \redirect()->route('site.login'); 
            }
        }else
        {
            return \redirect()->route('site.login');
        }
    }


    




}
