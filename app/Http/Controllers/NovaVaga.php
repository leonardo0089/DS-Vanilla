<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Vagas;
use App\Http\Controllers\ViewsMake;
class NovaVaga extends Controller
{
    public function cadastrarVaga(Request $request)
    {
        $id = Auth::id();
        
        $select = DB::select('select id_pj from usuario_pj where fk_id_usuario = ?',
        [
            $id
        ]);

        foreach($select as $key){ $id_pj = $key; }

        $categoria = $request->categoria;

        $id_cat = 0;

        if($categoria == 'Analista de Sistemas')
        {
            $id_cat = 1;
        }else if($categoria == 'Logistica')
        {
            $id_cat = 2;
        }else if($categoria == 'Serviços Gerais')
        {
            $id_cat = 3;
        }


        DB::insert('insert into 
        vagas (titulo_vaga, area_profissao, numero_vagas, local_trabalho, para_premium, oport_para, salario, beneficios, horario_trab, atividades, pre_requisitos, exigencias, expira_em, fk_id_user_pj, fk_categoria) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [
            $request->titulo_vaga,
            $request->esp_area,
            $request->n_vagas,
            $request->l_trabalho,
            $request->p_premium,
            $request->opt,
            $request->sal,
            $request->beneficios,
            $request->horario,
            $request->atividades,
            $request->p_requisitos,
            $request->exigencias,
            20,
            $id_pj->id_pj,
            $id_cat
        ]);

        return redirect()->route('dash.perfil');

    }

    public function makeVagaPost(Request $req)
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

            return view('vagas-postadas-pj',
            [
                'nome' => $nome,
                'foto' => $foto,
                'premium' => $tipo->dias_premium
            ]);
        }
        
    }
    public function makenewVaga(Request $req)
    {
        if(Auth::check() === true)
        {
            $lista = $this->userLogado($req);

            foreach($lista as $key)
            {
                $id = $key->id_pj;
            }
            $vagas = DB::table('vagas')->where('fk_id_user_pj', $id)->get();

            
            return view('vagas-postadas-listagem',
            [
                'vagas' => $vagas,
            ]);
        }
    }

    public function carregarFotoPJ(Request $request)
    {
        $id = Auth::id();
        $foto = DB::table('usuario_pj')->where('fk_id_usuario', $id)->get();
        return $foto;
    }



    public function carregaVagas(Request $req)
    {
        $id = Auth::id();
        
        $select = DB::select('select id_pj from usuario_pj where fk_id_usuario = ?',
        [
            $id
        ]);

        foreach($select as $key){ $id_pj = $key; }

        $res = DB::table('vagas')
            ->where('fk_id_user_pj', $id_pj)->first();

        return $res;
        
    }

    //Carrega detalhes da Vaga

    private function userLogado(Request $r)
    {
        $var = Auth::id();
        $pj_logado = DB::table('usuario_pj')->where('fk_id_usuario', $var)->get();


        return $pj_logado;
    }

    public function detalhesVagas_Postadas(Request $request, $vaga)
    {
        if(Auth::check() === true)
        {
            $u = Auth::user();
            if($u->type == 2)
            {
                $user_logado = $this->userLogado($request);

                foreach($user_logado as $c)
                {
                    $c1 = $c->id_pj;
                }   

                $vagas = DB::table('vagas')->where('fk_id_user_pj', $c1)->where('id_nova_vaga', $vaga)->get();

                foreach($vagas as $chave)
                {
                    $vgs = $chave;
                }

                $ft = $this->carregarFotoPJ($request);
                foreach($ft as $key2)
                {
                    $foto = $key2->foto;
                }
                

                return view('desc_vaga_post',
                [
                    'vaga' => $vgs,
                    'foto' => $foto                
                    
                ]);

            }
        }
    }



    public function carregar_Alterar(Request $request, $vaga)
    {
        if(Auth::check() === true)
        {
            $u = Auth::user();
            if($u->type == 2)
            {
                $user_logado = $this->userLogado($request);

                foreach($user_logado as $c)
                {
                    $c1 = $c->id_pj;
                }   

                $vagas = DB::table('vagas')->where('fk_id_user_pj', $c1)->where('id_nova_vaga', $vaga)->get();

                foreach($vagas as $chave)
                {
                    $vgs = $chave;
                }
                
                return view('att_vaga',
                [
                    'vaga' => $vgs              
                    
                ]);

            }
        }
    }


    public function atualizar_Vaga(Request $request, $id_vaga)
    {
        if(Auth::check() === true)
        {
            $u = Auth::user();
            if($u->type == 2)
            {
                $user_logado = $this->userLogado($request);

                foreach($user_logado as $c)
                {
                    $c1 = $c->id_pj;
                }   

                DB::table('vagas')
                ->where('fk_id_user_pj', $c1)
                ->where('id_nova_vaga', $id_vaga)
                ->update(
                    [
                        'titulo_vaga' => $request->titulo_vaga,
                        'area_profissao' => $request->esp_area,
                        'numero_vagas' => $request->n_vagas,
                        'local_trabalho' => $request->l_trabalho,
                        'para_premium' => $request->p_premium,
                        'oport_para' => $request->opt,
                        'salario' => $request->sal,
                        'beneficios' => $request->beneficios,
                        'horario_trab' => $request->horario,
                        'atividades' => $request->atividades,
                        'pre_requisitos' => $request->p_requisitos,
                        'exigencias' => $request->exigencias
                    ]);

                    return redirect()->route('perfil.vagas-postadas-pj');    
            }
        }
    }


    public function carregar_vagas_pf(Request $request)
    {
        $user_logged = Auth::id();


        if(Auth::check() === true)
        {
            
            $data_user = DB::table('usuario_pf')->where('fk_id_usuario', $user_logged)->get();

            //$id_rel =  DB::table('usuario')
            $id_da_cat = $data_user[0]->fk_categoria;
            $vagas = DB::table('vagas')->where('fk_categoria',$id_da_cat)->get();

            $vagas2 = DB::select('select * from usuario_pj as up inner join vagas as v on v.fk_id_user_pj = up.id_pj
                                  inner join categoria_vaga as cv on v.fk_categoria = cv.id_categoria where cv.id_categoria = ?',
                                    [
                                        $id_da_cat
                                    ]);

            //$nome_empresa = DB::table('usuario_pj')->where('id_pj', $id)->get();

            /*foreach($nome_empresa as $key)
            {
                $nome_fantasia = $key->nome_fantasia;
                $foto= $key->foto;
            }*/
            
            return view('pf.vagas1',
            [
                'vaga' => $vagas2
            ]);

        }

        
    }


    public function dados_da_vaga_pf(Request $request, $lista, $i)
    {
        if(Auth::check() === true)
        {

            $results = DB::table('vagas')->where('id_nova_vaga', $lista)->get();

            $lista = $results[0];

            $listagem = DB::table('usuario_pj')->where('nome_fantasia',$i)->get();

            $foto = $listagem[0]->foto;

            //dd($lista);
            return view('detalhesVaga',
            [
                'lista' =>  $lista,
                'nome' => $i,
                'foto' => $foto
            ]);
        }   
    }

    //Candidatando-se para a vaga 

    public function candidatando_se(Request $request, $id_vaga, $fk)
    {
        $views = new ViewsMake();

        $dados = $views->listaCV($request);

        $emp = DB::select('select * from usuario_pj where id_pj = ?', [$fk]);

        if(Auth::check() === true)
        {
            DB::transaction(function () use($request, $id_vaga, $dados, $emp)
            {
                
             

                DB::insert('insert into candidaturas 
                            (fk_usuario_pf, fk_vaga, fk_id_usuario_pj) 
                            values (?, ?, ?)', 
                            [
                                $dados->id_pf,
                                $id_vaga,
                                $emp[0]->id_pj
                            ]);

                $res = DB::select('select n_candidaturas from vagas where id_nova_vaga = ?', [$id_vaga]);
                $numero = $res[0]->n_candidaturas+1;
                DB::table('vagas')->where('id_nova_vaga', $id_vaga)->update(['n_candidaturas' => $numero]);
            });

            return \redirect()->route('dash.perfil');
        }
    }


    public function busca_avancada(Request $request)
    {
        if(Auth::check() === true)
        {
            $nome = $request->titulo;

            $pesq = DB::select('select * from vagas v
                                inner join usuario_pj as  up
                                on v.fk_id_user_pj = up.id_pj
                                inner join categoria_vaga as cat on v.fk_categoria = cat.id_categoria
                                where cat.nome_categoria like ?', 
            [
                $nome.'%' 
            ]);

            return view('busca-vaga',
            [
               'pesq' => $pesq
            ]);
        }
    }


    public function lista_de_candidaturas(Request $req)
    {

        if(Auth::check() === true)
        {
            $id_logado = Auth::id();
            $id_pf = DB::select('select id_pf from usuario_pf where fk_id_usuario = ?', [$id_logado]);

            
            $lista = DB::select('select * from candidaturas as c 
                                inner join usuario_pf as pf on c.fk_usuario_pf = pf.id_pf
                                inner join usuario_pj as pj on c.fk_id_usuario_pj = pj.id_pj
                                inner join vagas as v on  c.fk_vaga = v.id_nova_vaga where pf.id_pf = ?',
                                [
                                    $id_pf[0]->id_pf
                                ]);

            return $lista;
        }

    }

    public function lista_de_candidaturas_view(Request $request)
    {
        if(Auth::check() === true)
        {
            $listagem = $this->lista_de_candidaturas($request);

            $contagem = (int)count($listagem);

            //dd($contagem);
            return view('candidaturas',
            [
                'lista' => $listagem,
                'qtde'  => $contagem
            ]);
        }
    }


    public function candidatura_vaga(Request $request, $lista, $i)
    {
        if(Auth::check() === true)
        {

            $results = DB::table('vagas')->where('id_nova_vaga', $lista)->get();

            $lista = $results[0];

            $listagem = DB::table('usuario_pj')->where('nome_fantasia',$i)->get();

            $foto = $listagem[0]->foto;

            //dd($lista);
            return view('verificar-candidaturas',
            [
                'lista' =>  $lista,
                'nome' => $i,
                'foto' => $foto
            ]);
        }   
    }

    



}
