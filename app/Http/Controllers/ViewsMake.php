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

        if($valor == 48)
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
                                'data_nasc' => $request->nascimento,
                                'endereco' => $request->endereco
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

    public function telaBoleto1(Request $request)
    {
        if(Auth::check() === true)
        {
            return view('pf.boleto-pf');
        }
    }



    public function recuperando_Dados_Boleto(Request $request)
    {
        if(Auth::check() === true)
        {
            $id_user = Auth::user();

            //dd($id_user);
           $results = DB::select('select * from users as  u 
                                  inner join usuario_pf as pf  on u.id = pf.fk_id_usuario
                                  inner join curriculo as c on c.fk_id_pf = pf.id_pf where u.id = ?',
                                    [
                                        $id_user->id
                                    ]);
            return $results;
        }
    }

    public function recuperando_Dados_Produto(Request $request)
    {
        if(Auth::check() === true)
        {
            $results = $this->recuperando_Dados_Boleto($request);

            switch($results[0]->type)
            {
                case 1:
                    $values = DB::select('select p.nome_prod, p.preco, p.descricao, p.tipo_user  from produto as p where tipo_user = ?', 
                                        [
                                            1
                                        ]);
                    return $values;
                break;
                case 2:
                    $values = DB::select('select p.nome_prod, p.preco, p.descricao, p.tipo_user  from produto as p where tipo_user = ?', 
                                        [
                                            2
                                        ]);
                    return $values;
                break;
            }
        }
    }

    function formatPrice($vlprice)
    {

        if (!$vlprice > 0) $vlprice = 0;

        return number_format($vlprice, 2, ",", ".");

    }


    public function recuperar_dados_boleto(Request $request)
    {
        if(Auth::check() === true)
        {
            $id_user = Auth::user();

            //dd($id_user);
           $results = DB::select('select * from users as  u 
                                  inner join usuario_pf as pf  on u.id = pf.fk_id_usuario
                                  inner join curriculo as c on c.fk_id_pf = pf.id_pf where u.id = ?',
                                    [
                                        $id_user->id
                                    ]);
            switch($results[0]->type)
            {
                case 1:
                    $values = DB::select('select p.nome_prod, p.preco, p.descricao, p.tipo_user  from produto as p where tipo_user = ?', 
                                        [
                                            1
                                        ]);
                    return view('comprar-premium',
                    [
                        "lista" => $results[0],
                        "prod"  => $values[0]
                    ]);
                break;
                case 2:
                    $values = DB::select('select p.nome_prod, p.preco, p.descricao, p.tipo_user  from produto as p where tipo_user = ?', 
                                        [
                                            2
                                        ]);
                    return view('comprar-premium',
                    [
                        "lista" => $results[0],
                        "prod"  => $values[0]
                    ]);
                break;
            }
        }
    }

    public function montandoBoleto(Request $request)
    {
        $dados  = $this->recuperando_Dados_Boleto($request);
        $dados2 = $this->recuperando_Dados_Produto($request); 
        $pessoa = $dados[0];
        $produto = $dados2[0];

        $dias_de_prazo_para_pagamento = 5;
        $taxa_boleto = 6.00;
        $data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
        $valor_cobrado = $this->formatPrice($produto->preco); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
        $valor_cobrado = str_replace(",", ".",$valor_cobrado);
        $valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

        $dadosboleto["nosso_numero"] = '12345678';  // Nosso numero - REGRA: Máximo de 8 caracteres!
        $dadosboleto["numero_documento"] = '0123';	// Num do pedido ou nosso numero
        $dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
        $dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
        $dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
        $dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

        // DADOS DO SEU CLIENTE
        $dadosboleto["sacado"] = $pessoa->nome_sobrenome;
        $dadosboleto["endereco1"] = $pessoa->endereco;
        $dadosboleto["endereco2"] = $pessoa->endereco;

        // INFORMACOES PARA O CLIENTE
        $dadosboleto["demonstrativo1"] = "Pagamento de Compra DS-Vanilla";
        $dadosboleto["demonstrativo2"] = "Taxa bancária - R$ 0,00";
        $dadosboleto["demonstrativo3"] = "";
        $dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
        $dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
        $dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: suporte@ds-vanilla.com";
        $dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema DS-Vanilla - www.ds-vanilla.br";

        // DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
        $dadosboleto["quantidade"] = "1";
        $dadosboleto["valor_unitario"] = "";
        $dadosboleto["aceite"] = "";		
        $dadosboleto["especie"] = "R$";
        $dadosboleto["especie_doc"] = "";


        // ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


        // DADOS DA SUA CONTA - ITAÚ
        $dadosboleto["agencia"] = "1690"; // Num da agencia, sem digito
        $dadosboleto["conta"] = "48781";	// Num da conta, sem digito
        $dadosboleto["conta_dv"] = "2"; 	// Digito do Num da conta

        // DADOS PERSONALIZADOS - ITAÚ
        $dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

        // SEUS DADOS
        $dadosboleto["identificacao"] = "DS-Vanilla";
        $dadosboleto["cpf_cnpj"] = "24.700.731/0001-08";
        $dadosboleto["endereco"] = "Rua Ademar Saraiva Leão, 234 - Alvarenga, 09853-120";
        $dadosboleto["cidade_uf"] = "São Bernardo do Campo - SP";
        $dadosboleto["cedente"] = "DS-Vanilla LTDA - ME";

        // NÃO ALTERAR!
        $path = "C:" . DIRECTORY_SEPARATOR . "wamp64" . DIRECTORY_SEPARATOR . "www" . DIRECTORY_SEPARATOR . "DS-Vanilla" . DIRECTORY_SEPARATOR . "ds-vanilla" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "boletophp" . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR;

        require_once($path . "funcoes_itau.php");
        require_once($path . "layout_itau.php");
        

    }

}
