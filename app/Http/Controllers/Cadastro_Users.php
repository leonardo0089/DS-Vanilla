<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Modelo;
use App\Models\ClientePF;
use App\Images;

class Cadastro_Users extends Controller
{
    private function selecionarUltimoID($lista, $nomeCampo)
    {
        foreach($lista as $val)
        {
            $valores = $val->$nomeCampo;
        }

        return $valores;
    }

    public function inserindoCurriculo(Request $request)
    {   
        DB::transaction(function () use($request){

            $select1 = DB::select('select MAX(id_pf) as ultimo from usuario_pf');
            $uId1 = $this->selecionarUltimoID($select1, "ultimo");
            $path = $this->savePic($request);
            //Inserindo dados do curriculo
            DB::insert('insert into curriculo 
            (dados, nacionalidade, telefone, sexo, deficiencia, msg_whats, estado_civil, data_nasc, fk_id_pf, foto, endereco) 
            values 
            (:dados, :nacionalidade, :telefone, :sexo, :deficiencia, :msg_whats, :estado_civil, :data_nasc, :fk_id_pf, :foto, :endereco)', 
            [
                ':dados' => $request->dados_do_usuario,
                ':nacionalidade' => $request->nacionalidade,
                ':telefone' => $request->cel,
                ':sexo' => $request->sexo,
                ':deficiencia' => $request->deficiencia,
                ':msg_whats' => $request->receberMsg,
                ':estado_civil' => $request->estado_civil,
                ':data_nasc' => $request->nascimento,
                ':fk_id_pf' => $uId1,
                ':foto' => $path,
                ':endereco' => $request->endereco
            ]);

            
            $select = DB::select('select MAX(id_curriculo) as ultimo from curriculo');
            $uId = $this->selecionarUltimoID($select, "ultimo");

            //Inserindo redes sociais
            DB::insert('insert into redes_sociais 
            (fk_curriculo, link_linkedin, link_facebook, link_twitter, link_google, link_youtube, link_insta, link_blog) 
            values 
            (:fk_curriculo, :link_linkedin, :link_facebook, :link_twitter, :link_google, :link_youtube, :link_insta, :link_blog)', 
            [
                ':fk_curriculo' => $uId,
                ':link_linkedin' => $request->redeLink,
                ':link_facebook' => $request->redeFace,
                ':link_twitter'  => $request->redeTW,
                ':link_google'   => $request->redeGoogle,
                ':link_youtube'  => $request->redeYou,
                ':link_insta'    => $request->redeInsta,
                ':link_blog'     => $request->redeBlog
            ]);
            
            //Inserindo formação Academica
            
            DB::insert('insert into formacao 
            (instituicao, pais, cidade, formacao, nivel, periodo, data_iniciof, data_conclusao, status, fk_curriculo) 
            values 
            (:instituicao, :pais, :cidade, :formacao, :nivel, :periodo, :data_iniciof, :data_conclusao, :status, :fk_curriculo)', 
            [
                ':instituicao' => $request->instituicao,
                ':pais' => $request->pais,
                ':cidade' => $request->cidade,
                ':formacao' => $request->formacao,
                ':nivel' => $request->nivel,
                ':periodo' => $request->periodo,
                ':data_iniciof' => $request->data_inicio,
                ':data_conclusao' => $request->conclusao_data,
                ':status' => $request->statuses,
                ':fk_curriculo' => $uId
            ]);

            //Inserindo experiencias profissionais

            DB::insert('insert into experiencias
            (nome_empresa, cargo, nivel_hirarquico, pais_exp, cidade_exp, nivel, desc_atividades, periodo, data_inicio, termino, fk_id_curriculo_exp) 
            values 
            (:nome_empresa, :cargo, :nivel_hirarquico, :pais_exp, :cidade_exp, :nivel, :desc_atividades, :periodo, :data_inicio, :termino, :fk_id_curriculo_exp)', 
            [
                ':nome_empresa' => $request->nome_empresa,
                ':cargo' => $request->cargo,
                ':nivel_hirarquico' => $request->nivelH,
                ':pais_exp' => $request->paisE,
                ':cidade_exp' => $request->cidadeE,
                ':nivel' => $request->nivelE,
                ':desc_atividades' => $request->atividadeE,
                ':periodo' => $request->periodoE,
                ':data_inicio' => $request->data_inicioE,
                ':termino' => $request->termino,
                ':fk_id_curriculo_exp' => $uId,
                
            ]);
        });

       
        return redirect()->route('site.login');
    }

    //Insere um novo usuario PJ
    public function insertUserPJ(Request $request)
    {
        
        DB::transaction(function () use($request)
        {
            $query = DB::insert('insert into 
            users (email, password, type) 
            values (:pj_email, :pj_password, :pj_type)', 
            [
                ':pj_email' => $request->email_pj,
                ':pj_password' => bcrypt($request->senha_pj),
                ':pj_type' => 2
            ]);

            $select = DB::select('select MAX(id) as ultimo from users');
                    
            $uId = $this->selecionarUltimoID($select, "ultimo");  

            DB::insert('insert into 
            usuario_pj (cnpj, nome_fantasia, fk_id_usuario) 
            values (?, ?, ?)', 
            [
                $request->cnpj,
                $request->nome_f,
                $uId
            ]);
            
        });

        return redirect()->route('cont.cad-pj');
          
    }



    //Insere um novo usuario PF
    public function insertUserPF(Request $request)
    {

            DB::transaction(function () use($request){

                
                $query = DB::insert('insert into users (email, password, type) values (:email, :password, :type)', 
                    [
                    ':email' => $request->email_pf,
                    ':password' => bcrypt($request->senha_pf),
                    ':type' => 1
                    ]);
                    
                    $select = DB::select('select MAX(id) as ultimo from users');
                    
                    $meuid = $this->selecionarUltimoID($select, "ultimo");

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


                    DB::insert('insert into usuario_pf (nome_sobrenome, cpf, cargo_desejado, fk_categoria, fk_id_usuario) values (?, ?, ?, ?, ?)', 
                    [    
                        $request->nome_e_sobrenome,
                        $request->cpf_pf,
                        $request->cargo_desejado,
                        $id_cat,
                        $meuid
                        
                    ]);
                    

        });

            return redirect()->route('site.cadastroPF');
    }

    public function saveNewPJ(Request $request)
    {

        $path = $this->savePic($request);
        $select = DB::select('select MAX(id) as ultimo from users');                    
        $meuid = $this->selecionarUltimoID($select, "ultimo");

        DB::table('usuario_pj')
                ->where('fk_id_usuario', $meuid)
                ->update(
                    [
                        'endereco' => $request->endereco,
                        'foto' => $path,
                        'cidade' => $request->cidade,
                        'estado' => $request->estado,
                        'cep' => $request->cep,
                        'cel' => $request->cel,
                        'tel_fixo' => $request->tel_fixo,
                        'tipo_contratacao' => $request->tipo_contratacao,
                        'tipo_empresa' => $request->tipo_empresa,
                        'sobre_empresa' => $request->sobre_emp,
                        'receb_prop' => $request->receb_prop
                    ]);
        
        return redirect()->route('site.login');
    }

    public function attPJCad(Request $request)
    {

        $id = Auth::id();

        DB::table('usuario_pj')
            ->where('fk_id_usuario', $id)
            ->update(
                [
                        'endereco' => $request->endereco,
                        'cidade' => $request->cidade,
                        'estado' => $request->estado,
                        'cep' => $request->cep,
                        'cel' => $request->cel,
                        'tel_fixo' => $request->tel_fixo,
                        'tipo_contratacao' => $request->tipo_contratacao,
                        'tipo_empresa' => $request->tipo_empresa,
                        'sobre_empresa' => $request->sobre_emp,
                        'receb_prop' => $request->receb_prop

                ]);


        return redirect()->route('dash.perfil');
    }


    public function savePic(Request $request)
    {  
            $file = $request->allFiles()['foto_user'];
            $path = $file->store('fotos');
            return $path;
    }


    public function cadastrar_forma_pagamento_view(Request $request)
    {
        $id = Auth::id();
        if(Auth::check() === true)
        {
            $dados = DB::select('select * from dados_pagamento where fk_id_user = ?', [$id]);
            if(count($dados) > 0 )
            {
                

                return view('dados-Compra-Att',
                [
                    'lista' => $dados[0]
                ]);
            }else{

            return view('dados-Compra-Att');
            }
        }
    }

    public function cadastrar_forma_pagamento(Request $request)
    {
        if(Auth::check() === true)
        {
            $id_user = Auth::id();
            $dados = DB::select('select * from dados_pagamento where fk_id_user = ?', [$id_user]);
            if(count($dados) == 0){
            DB::insert('insert into dados_pagamento 
                        (fk_id_user, nome_pessoa, tipo_pagamento, endereco, cpf, estado, celular) 
                        values (?, ?, ?, ?, ?, ?, ?)', 
                        [
                            $id_user,
                            $request->nome,
                            $request->tipo_pg,
                            $request->end,
                            $request->cpf,
                            $request->estado,
                            $request->celular
                        ]);
                        return redirect()->route('perfil.pf.att.pgt');
            }else{

                DB::table('dados_pagamento')->where('fk_id_user', $id_user)
                ->update(
                    [
                        'nome_pessoa' => $request->nome, 
                        'tipo_pagamento' => $request->tipo_pg, 
                        'endereco' => $request->end, 
                        'cpf' => $request->cpf, 
                        'estado' => $request->estado, 
                        'celular' => $request->celular
                    ]);
                   return redirect()->route('perfil.pf.att.pgt');
            }
        }
    }



}
