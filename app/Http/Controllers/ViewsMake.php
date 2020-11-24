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
                    $percent = $this->curriculoPercent($req);

                    $lista = $this->listaCV($req);

                    //dd($lista);
                    
                    return view('perfilPF', 
                    [
                        'ds' => $v,
                        'dias' => $diasPremium,
                        'foto' => $ft,
                        'percent' => $percent,
                        'listagem' => $lista
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
        
        foreach($pesq as $key => $value)
        {
            $n = $key;
        }

        //Contando quantos registros foram achados
        $valor = count((array)$pesq[0]); 

        if($valor == 47)
        {
            $valor = 100;
            return $valor;
            
        }else if($valor < 45 && $valor > 35)
        {
            $valor = 70;
            return $valor;
            
        }else if($valor < 35 && $valor > 25)
        {
            $valor = 50;
            return $valor;
        }else if($valor < 25 && $valor > 15)
        {
            $valor = 20;
            return $valor;
        }else if($valor < 15 && $valor > 5)
        {
            $valor = 10;
            return $valor;
        }else
        {
            $valor = 0;
            return $valor;
        }
        

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

    public function listaCV(Request $request)
    {
        $user = Auth::user();
        
        if(Auth::check() === true)
        {
            $meuid = $this->getSession($request);
            $id = Auth::id();
            if($user->type == 1)
            {
                $pesq = DB::select('select * from usuario_pf as pf 
                inner join curriculo as cur on (pf.id_pf = cur.fk_id_pf)
                inner join experiencias as exxp on (cur.id_curriculo = exxp.fk_id_curriculo_exp)
                inner join formacao as form on (cur.id_curriculo = form.fk_curriculo)
                inner join redes_sociais as rs on (cur.id_curriculo = rs.fk_curriculo) where pf.fk_id_usuario = :id',
                [
                    'id' => $id
                ]);
                    
                foreach($pesq as $key)
                {
                    $lista = $key;
                }
                
                return $lista;
               
            }
        }
    }


    public function carregarCurriculo(Request $request)
    {
        $user = Auth::user();
        
        if(Auth::check() === true)
        {
            $meuid = $this->getSession($request);
            $id = Auth::id();
            if($user->type == 1)
            {
                $pesq = DB::select('select * from usuario_pf as pf 
                inner join curriculo as cur on (pf.id_pf = cur.fk_id_pf)
                inner join experiencias as exxp on (cur.id_curriculo = exxp.fk_id_curriculo_exp)
                inner join formacao as form on (cur.id_curriculo = form.fk_curriculo)
                inner join redes_sociais as rs on (cur.id_curriculo = rs.fk_curriculo) where pf.fk_id_usuario = :id',
                [
                    'id' => $id
                ]);
                    
                foreach($pesq as $key)
                {
                    $lista = $key;
                }
                


                return view('atualizar-curriculo',
                [
                    'lista' => $lista
                ]);    
               
            }
        }
    }


    public function atualizaCV(Request $request)
    {
        $user = Auth::user();
        
        if(Auth::check() === true)
        {
            $id = Auth::id();
            if($user->type == 1)
            {
               
                DB::transaction(function () use($request) 
                {
                    $meuid = $this->getSession($request);
                    DB::table('curriculo')->where('fk_id_pf', $meuid[0]->id_pf)
                        ->update(
                            [
                                'dados' => $request->dados_do_usuario,
                                'nacionalidade' => $request->nacionalidade,
                                'telefone' => $request->cel,
                                'sexo' => $request->sexo,
                                'deficiencia' => $request->deficiencia,
                                'msg_whats' => $request->receberMsg,
                                'estado_civil' => $request->estado_civil,
                                'data_nasc' => $request->nascimento
                            ]);

                        $i = $meuid[0]->id_pf;   
                        $curriculo = DB::table('curriculo')->where('fk_id_pf', $i)->get();            
                        $id_curriculo = $curriculo[0]->id_curriculo;   

                    DB::table('redes_sociais')->where('fk_curriculo', $id_curriculo)
                        ->update(
                            [
                                'link_linkedin' => $request->redeLink,
                                'link_facebook' => $request->redeFace,
                                'link_twitter'  => $request->redeTW,
                                'link_google'   => $request->redeGoogle,
                                'link_youtube'  => $request->redeYou,
                                'link_insta'    => $request->redeInsta,
                                'link_blog'     => $request->redeBlog
                            ]);
 
                    DB::table('formacao')->where('fk_curriculo', $id_curriculo)
                        ->update(
                            [
                                    'instituicao' => $request->instituicao,
                                    'pais' => $request->pais,
                                    'cidade' => $request->cidade,
                                    'formacao' => $request->formacao,
                                    'nivel' => $request->nivel,
                                    'periodo' => $request->periodo,
                                    'data_iniciof' => $request->data_inicio,
                                    'data_conclusao' => $request->conclusao_data,
                                    'status' => $request->statuses
                            ]);


                    DB::table('experiencias')->where('fk_id_curriculo_exp', $id_curriculo)
                        ->update(
                            [
                                'nome_empresa' => $request->nome_empresa,
                                'cargo' => $request->cargo,
                                'nivel_hirarquico' => $request->nivelH,
                                'pais_exp' => $request->paisE,
                                'cidade_exp' => $request->cidadeE,
                                'nivel' => $request->nivelE,
                                'desc_atividades' => $request->atividadeE,
                                'periodo' => $request->periodoE,
                                'data_inicio' => $request->data_inicioE,
                                'termino' => $request->termino
                            ]);
                    
                });

                return redirect()->route('dash.perfil');
               
            }
        }
    }

    




}
