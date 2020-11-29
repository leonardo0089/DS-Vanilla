<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Controllers\ViewsMake;

class FuncoesPJ extends Controller
{
    //Atualizando dados de pagamento PJ

    public function attPagPJ(Request $request) //Pegando dados do usuario PJ
    { 
        $user = Auth::user();

        if(Auth::check() === true && $user->type == 2) 
        {
            $id = Auth::id();

            $userPJ = DB::select('
            select *  from  users as u 
            inner join usuario_pj as  pj on pj.fk_id_usuario = u.id where u.id = ?', 
            [
                $id
            ]);
            
            return $userPJ;
        }
        return \redirect()->route('site.login');

    }

    //Procurando por registros de formas de pagamento pj

    public function registerPayment(Request $request)
    {
        $id = Auth::id();
        $registers = DB::select('select * from dados_pagamento where fk_id_user = ?', 
                                [
                                    $id
                                ]);
        return $registers;
    }

    //Montando a view do usuario PJ
    public function makeViewattPagPJ(Request $request)
    {
        $user = Auth::user();

        if(Auth::check() === true && $user->type == 2)
        {
            $id = Auth::id();
            $values = $this->attPagPJ($request);
            $foto = $values[0]->foto;
            $premium = $values[0]->premium;
            $nome = $values[0]->nome_fantasia;

            $dados = DB::select('select * from dados_pagamento where fk_id_user = ?', [$id]);

            if(count($dados) > 0)
            {
                return view('atualizar-dados-pj',
                [
                    'foto' => $foto,
                    'premium' => $premium,
                    'nome' => $nome,
                    'dados' => $dados[0],
                    'deu_certo' => false,
                    'att' => false
                ]);
            }

            
                return view('atualizar-dados-pj',
                [
                    'foto' => $foto,
                    'premium' => $premium,
                    'nome' => $nome,
                    'deu_certo' => false,
                    'att' => false
                ]);
            
            


        }
        return \redirect()->route('site.login');

    }

//Inserindo dados de pagamento usuario pj ou Atualizando
    public function insertOrUpdate(Request $request)
    {
    
        $user = Auth::user();
        
        if(Auth::check() === true && $user->type == 2)
        {
            $dados_pg = $this->registerPayment($request);
            $user_logged = $this->attPagPJ($request);

            $foto = $user_logged[0]->foto;
            $premium = $user_logged[0]->premium;
            $nome = $user_logged[0]->nome_fantasia;
            $id = Auth::id();
            $dados = DB::select('select * from dados_pagamento where fk_id_user = ?', [$id]);
            
            if(count($dados_pg) == 0)
            {
                $query= DB::insert('insert into dados_pagamento 
                            (fk_id_user, nome_pessoa, tipo_pagamento, endereco, cpf, estado, celular) 
                            values 
                            (?, ?, ?, ?, ?, ?, ?)', 
                            [
                                $user->id,
                                $request->nome,
                                $request->tipo,
                                $request->end,
                                $request->cnpj,
                                $request->estado,
                                $request->celular
                            ]);
                
                           
                return view('atualizar-dados-pj',
                [
                    'deu_certo' => $query,
                    'foto' => $foto,
                    'premium' => $premium,
                    'nome' => $nome
                ]);
            }else if(count($dados_pg) > 0)
            {
                $dats = DB::table('dados_pagamento')
                ->where('fk_id_user', $user->id)
                ->update(
                    [
                     'nome_pessoa'=>$request->nome,
                     'tipo_pagamento'=>$request->tipo,
                     'endereco'=>$request->end,
                     'cpf'=>$request->cnpj,
                     'estado'=>$request->estado,
                     'celular'=>$request->celular
                    ]);
                return redirect()->route('perfil.atualizar-dados-pj',
                    [
                        'dados' => $dados[0],
                        'deu_certo' => false,
                        'foto' => $foto,
                        'premium' => $premium,
                        'nome' => $nome,
                        'att' => $dats
                    ]);
            }
        }
        return \redirect()->route('site.login');

    }

    function formatPrice($vlprice)
    {

        if (!$vlprice > 0) $vlprice = 0;

        return number_format($vlprice, 2, ",", ".");

    }


    public function makeViewComprarPremiumPJ(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $user_logged = $this->attPagPJ($request);
            $produto = DB::table('produto')->where('tipo_user',2)->get();

            return view('comprar-premium-pj',
            [
                'foto' => $user_logged[0]->foto,
                'premium' => $user_logged[0]->premium,
                'nome' => $user_logged[0]->nome_fantasia,
                'prod' => $produto[0]
            ]);
        }
        return \redirect()->route('site.login');

    }
   

    public function recuperando_Dados_Boleto(Request $request)
    {
        $pessoa = $this->attPagPJ($request);
        return $pessoa;
    }

    public function recuperando_Dados_Produto(Request $request)
    {
        $produto = DB::table('produto')->where('tipo_user',2)->get();
        return $produto;
    }

    public function telaBoleto1(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            return view('pj.boleto-pj');
        }
        return \redirect()->route('site.login');

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
        $dadosboleto["sacado"] = $pessoa->nome_fantasia;
        $dadosboleto["endereco1"] = $pessoa->endereco;
        $dadosboleto["endereco2"] = $pessoa->cidade;

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

    public function makeViewBuscaFunc(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            return view('busca-funcionario');
        }
    }

    public function searchFuncionario(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $nome = $request->titulo;
            $pesq = DB::select('select * from usuario_pf as pf 
                                inner join users as u on pf.fk_id_usuario = u.id
                                inner join curriculo as c on c.fk_id_pf = pf.id_pf
                                inner join categoria_vaga as cat on pf.fk_categoria = cat.id_categoria
                                inner join redes_sociais as r on r.fk_curriculo = c.id_curriculo
                                inner join  experiencias as exp on exp.fk_id_curriculo_exp = c.id_curriculo
                                where cat.nome_categoria like ?', 
                                [
                                    $nome . '%'
                                ]);
            return view('busca-funcionario',
            [
                'pesq' => $pesq
            ]);
        }
    }

    public function mostrarDadosUser(Request $request, $id)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $pesq = DB::select('select * from users as u 
                                inner join usuario_pf as pf on pf.fk_id_usuario = u.id
                                inner join curriculo as c on c.fk_id_pf = pf.id_pf
                                inner join redes_sociais as r on r.fk_curriculo = c.id_curriculo
                                inner join experiencias as exp on exp.fk_id_curriculo_exp = c.id_curriculo
                                inner join categoria_vaga as cat on pf.fk_categoria = cat.id_categoria
                                where u.id = ?', 
                                [
                                    $id
                                ]);
            return view('perfil-funcionario',
            [
                'pesq' => $pesq[0]
            ]);
        }
    }

}
