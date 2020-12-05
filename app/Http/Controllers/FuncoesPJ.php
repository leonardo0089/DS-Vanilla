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

    public function initChat(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true)
        {

            $chat = DB::table('chat')->where('fk_id_users', $user->id)->get();

            if(count($chat) == 0)
            {
                DB::transaction(function () use($request, $user) 
                {
                    DB::insert('insert into chat 
                    (fk_id_users, type_user) 
                    values (?, ?)', 
                    [
                        $user->id,
                        $user->type
                    ]);
                });
            }

        }
    }


    public function novaConversa(Request $request, $id_pf, $id)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {

            $pesq = DB::select('select id_chat from chat where fk_id_users = ?', [$id]);

            $query = DB::table('conversa')->where('fk_id_chat', $pesq[0]->id_chat)->get();
           // $query2 = DB::table('chat')->where('fk_id_users', $id)->get();

            $id_logged = Auth::id();
            
            $select_idPJ = DB::select('select pj.id_pj from usuario_pj as pj
            inner join users as u on pj.fk_id_usuario = u.id
            where u.id = ?', [$id_logged]);

            $user_pf = DB::select('select * from conversa as c 
            inner join  chat as ch  on c.fk_id_chat = ch.id_chat
            inner join  users as  u on ch.fk_id_users = u.id
            inner join  usuario_pf as pf on pf.fk_id_usuario = u.id
            inner join  curriculo as cur on cur.fk_id_pf = pf.id_pf
            where c.fk_pj = ?', 
            [
                $select_idPJ[0]->id_pj
            ]);

            $b = DB::select('select * from conversa as c where c.fk_pf = ? and c.fk_pj = ?', [$id_pf, $select_idPJ[0]->id_pj]);
              
            if(count($b) == 0){
                DB::insert('insert into conversa
                (fk_id_chat, fk_pf, fk_pj) 
                values (?, ?, ?)', 
                [
                    $pesq[0]->id_chat,
                    $id_pf,
                    $select_idPJ[0]->id_pj
                ]);
                
                return \redirect()->route('perfil.chat-pj');
                }
                return \redirect()->route('perfil.chat-pj');
            
            

        }
    }


    public function makeViewChat(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $id_logged = Auth::id();
            
            $select_idPJ = DB::select('select pj.id_pj from usuario_pj as pj
            inner join users as u on pj.fk_id_usuario = u.id
            where u.id = ?', [$id_logged]);

            $user_pf = DB::select('select * from conversa as c 
            inner join  chat as ch  on c.fk_id_chat = ch.id_chat
            inner join  users as  u on ch.fk_id_users = u.id
            inner join  usuario_pf as pf on pf.fk_id_usuario = u.id
            inner join  curriculo as cur on cur.fk_id_pf = pf.id_pf
            where c.fk_pj = ?', 
            [
                $select_idPJ[0]->id_pj
            ]);

            
          
            
            return view('chat-pj',
            [
                'usuario' => $user_pf,
                
                
            ]);
        }
    }

    public function enviarMsg(Request $request, $id, $id_pessoa, $nome, $id_chat)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {

                $id_pj = DB::select('select pj.id_pj from usuario_pj as pj  inner join users as u on pj.fk_id_usuario = u.id where u.id = ?', [$user->id]);
                $id_pf = DB::select('select pf.id_pf from usuario_pf as pf where pf.nome_sobrenome = ?', [$nome]);

                $ids = DB::select('select c.id_conversa from  conversa as c where c.fk_pj = ? and c.fk_pf = ?', 
                [
                    $id_pj[0]->id_pj,
                    $id_pf[0]->id_pf
                ]);
                
                
                
                DB::insert('insert into mensagens
                (fk_id_conversa, msg, quem_enviou, quem_recebeu) 
                values 
                (?, ?, ?, ?)', 
                [
                    $ids[0]->id_conversa,
                    $request->msg,
                    $user->id,
                    $id_pessoa
                ]);

            return \redirect()->route('na.conversa', [$nome, $id_chat]);
        }

    }

    public function index(Request $request, $chat)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $pesq = DB::select('select * from  mensagens as m 
            inner join conversa as c  on m.fk_id_conversa = c.id_conversa
            inner join usuario_pj as pj on c.fk_pj = pj.id_pj
            inner join usuario_pf as pf on c.fk_pf = pf.id_pf
            inner join users as u on pj.fk_id_usuario = u.id
            where u.id = ? and c.fk_id_chat = ?', 
            [
                $user->id,
                $chat
            ]);
        
            
            return $pesq;
        }
    }

    public function viewInterna()
    {
        return view('tela_chat_interno');
    }

    public function makeMsgs(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $pesq = DB::select('select * from mensagens where fk_pessoa = ? and id_conversa = ?', 
            [

            ]);

            return view('tela_chat_interno');
        }
    }


    public function entrarConversa(Request $request,$nome,$id_chat)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $pesq = $this->pesq_Chats($request);
            $conversas = $this->index($request, $id_chat);
            $ids = DB::select('select * from  chat as ch 
            inner join conversa as c on  c.fk_id_chat = ch.id_chat
            inner join usuario_pf as pf on pf.id_pf = c.fk_pf
            where c.fk_id_chat = ? and pf.nome_sobrenome = ?', [$id_chat, $nome]);
            
            
            
            
            $dados = $this->pesqMsgsEnviadas($request, $ids[0]->fk_id_users);
            $dados2 = $this->pesqMsgsRecebidas($request, $ids[0]->fk_id_users);

           
            
            return view('chat-pj',
            [
                'usuario' => $pesq,
                'nome' => $nome,
                'id_chat'=> $id_chat,
                'conv'=> $conversas,
                'id_conversa' => $ids[0]->id_conversa,
                'id_pessoa' =>  $ids[0]->fk_id_users,
                'nome' =>  $ids[0]->nome_sobrenome,
                'id_do_chat' =>  $ids[0]->id_chat,
                'dados1'=> $dados,
                'dados2'=> $dados2

            ]);
        }

    }


    private function pesq_Chats(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $id_logged = Auth::id();
            
            $select_idPJ = DB::select('select pj.id_pj from usuario_pj as pj
            inner join users as u on pj.fk_id_usuario = u.id
            where u.id = ?', [$id_logged]);

            $user_pf = DB::select('select * from conversa as c 
            inner join  chat as ch  on c.fk_id_chat = ch.id_chat
            inner join  users as  u on ch.fk_id_users = u.id
            inner join  usuario_pf as pf on pf.fk_id_usuario = u.id
            inner join  curriculo as cur on cur.fk_id_pf = pf.id_pf
            where c.fk_pj = ?', 
            [
                $select_idPJ[0]->id_pj
            ]);

            return $user_pf;
        }
    }


    public function pesqMsgsEnviadas(Request $request, $id)
    {
        $user = Auth::user();

        $dados =    DB::select('select m.msg, u.`type`, pj.nome_fantasia from mensagens as m
                    inner join conversa as c on m.fk_id_conversa = c.id_conversa
                    inner join users as u on m.quem_enviou = u.id
                    inner join usuario_pj as  pj on pj.fk_id_usuario = u.id
                    where m.quem_enviou = ? and m.quem_recebeu = ? ',
                    [
                        $user->id,
                        $id,
                    ]);
        return $dados;
    }
    public function pesqMsgsRecebidas(Request $request, $id)
    {
        $user = Auth::user();
        
        $quem_rec = DB::select('select m.msg, u.`type`, pf.nome_sobrenome from mensagens as m
                    inner join conversa as c on m.fk_id_conversa = c.id_conversa
                    inner join users as u on m.quem_enviou = u.id
                    inner join usuario_pf as  pf on pf.fk_id_usuario = u.id
                    where m.quem_enviou = ? and m.quem_recebeu = ?',
                    [
                        $id,
                        $user->id
                    ]);

        return $quem_rec;
    }


    //Metodo para lista todas as candidaturas mostrando 
    //Nome
    //Categoria em que o funcionario está cadastrado na plataforma

    public function viewCandidaturas(Request $request, $id_vaga, $id_pj)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 2)
        {
            $dados = $this->dados_funcLista($request, $id_vaga);
            $foto = $dados[0]->foto;
            $dias = $dados[0]->dias_premium;
            $ds = $dados[0]->nome_fantasia;
            return view('lista_de_candidatos',
            [
                'foto' => $foto,
                'premium' => $dias,
                'nome' => $ds,
                'dados'=> $dados
            ]);
        }
        return \redirect()->route('site.login');
    }


    private function dados_funcLista(Request $request, $id_vaga)
    {
        $data = DB::select('select * from candidaturas as c 
                            inner join usuario_pf as pf on c.fk_usuario_pf = pf.id_pf
                            inner join usuario_pj as pj on c.fk_id_usuario_pj = pj.id_pj
                            inner join users as u on pf.fk_id_usuario = u.id
                            where c.fk_vaga = ?', 
                            [$id_vaga]);

        return $data;


    }



}
