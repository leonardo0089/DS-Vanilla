<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Vagas;
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

        DB::insert('insert into 
        vagas (titulo_vaga, area_profissao, numero_vagas, local_trabalho, para_premium, oport_para, salario, beneficios, horario_trab, atividades, pre_requisitos, exigencias, expira_em, fk_id_user_pj) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
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
            $id_pj->id_pj
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


    



}
