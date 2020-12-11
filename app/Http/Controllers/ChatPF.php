<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Controllers\ViewsMake;
use App\Http\Controllers\FuncoesPJ;

class ChatPF extends Controller
{

    //Este metodo retorna as conversas com as empresas

    public function conversas(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 1)
        {
            $pesq = $this->searchConversas($request);

            return view('chat',
            [
                'pesq' => $pesq
            ]);
        }
    }


    private function searchConversas(Request $request)
    {
        $user = Auth::user();

        $pesq =  DB::select('select ch.id_chat, c.id_conversa, c.fk_pf, c.fk_pj, pj.nome_fantasia, pj.foto, pj.fk_id_usuario from chat as ch 
                    inner join conversa as c on  c.fk_id_chat = ch.id_chat
                    inner join usuario_pj as pj on  c.fk_pj = pj.id_pj 
                    inner join usuario_pf as pf on  c.fk_pf = pf.id_pf
                    where ch.fk_id_users = ?', 
                    [
                        $user->id
                    ]); 
                        
        return $pesq;
    }

    public function clicando_na_Conversa(Request $request, $id_conversa, $id_pj, $id_pf, $id_pessoa)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 1)
        {
            $pesq = $this->searchConversas($request);
            $msgs = $this->retorna_Mensagens($request, $id_pj, $id_pf);

            //dd($pesq);
            //dd($msgs);

            $idUser = DB::select('select u.id from users as u 
                                inner join usuario_pj as pj on pj.fk_id_usuario = u.id
                                where pj.id_pj = ?', 
                                [
                                    $id_pj
                                ]);
                                
                              
                                
                                $dados = $this->pesqMsgsEnviadas($request,$idUser[0]->id);
                                $dados2 = $this->pesqMsgsRecebidas($request, $idUser[0]->id);
                                
                                
            return view('chat',
            [
                'pesq' => $pesq,
                'msgs' => $msgs,
                'dados' =>$dados,
                'dados2'=>$dados2,
                'id_conversa' => $id_conversa,
                'id_pj' => $id_pj,
                'id_pf' => $id_pf,
                'id_pessoa' => $id_pessoa

            ]);
        }
    }

    //Metodo responsavel por retornar mensagens
    private function retorna_Mensagens(Request $request, $id, $id_pf)
    {
        $msg = DB::select('select m.msg, pj.nome_fantasia, pf.id_pf, pf.nome_sobrenome from conversa as c
                            inner join mensagens as m  on m.fk_id_conversa =  c.id_conversa
                            inner join usuario_pj as pj on c.fk_pj = pj.id_pj
                            inner join usuario_pf as pf on  c.fk_pf = pf.id_pf
                            where c.fk_pj = ? and pf.id_pf = ?', 
                           [
                                $id,
                                $id_pf
                           ]);

        return $msg;
    }


    //Metodo para enviar Mensagem 

    public function enviar_Mensagem(Request $request, $id_conversa, $fk_pessoa)
    {
        $user = Auth::user();
        if(Auth::check() === true && $user->type == 1)
        {



            $idpf = DB::select('select pf.id_pf from users as u 
                                inner join usuario_pf as pf  on pf.fk_id_usuario = u.id
                                where u.id = ?', [$user->id]);

            
            $idpj = DB::select('select pj.id_pj from users as u 
                                inner join usuario_pj as pj  on pj.fk_id_usuario = u.id
                                where u.id = ?', [$fk_pessoa]);

           
            
            DB::insert('insert into mensagens
            (fk_id_conversa, msg, quem_enviou, quem_recebeu) 
            values 
            (?, ?, ?, ?)', 
            [
                $id_conversa,
                $request->msg,
                $user->id,
                $fk_pessoa
            ]);

            return \redirect()->route('clicando.na.conversa',[$id_conversa, $idpj[0]->id_pj, $idpf[0]->id_pf, $fk_pessoa]);
        }
    }

    public function pesqMsgsEnviadas(Request $request, $id)
    {
        $user = Auth::user();
        
        $dados =    DB::select('select m.msg, u.`type`, pf.nome_sobrenome from mensagens as m
                                inner join conversa as c on m.fk_id_conversa = c.id_conversa
                                inner join users as u on m.quem_enviou = u.id
                                inner join usuario_pf as  pf on pf.fk_id_usuario = u.id
                                where m.quem_enviou = ? and m.quem_recebeu = ?',
                                [
                                    $user->id,
                                    $id
                                ]);
        return $dados;
    }
    public function pesqMsgsRecebidas(Request $request, $id)
    {
        $user = Auth::user();
        
        $quem_rec = DB::select('select m.msg, u.`type`, pj.nome_fantasia from mensagens as m
                                inner join conversa as c on m.fk_id_conversa = c.id_conversa
                                inner join users as u on m.quem_enviou = u.id
                                inner join usuario_pj as  pj on pj.fk_id_usuario = u.id
                                where m.quem_enviou = ? and m.quem_recebeu = ?',
                                [
                                    $id,
                                    $user->id
                                ]);

        return $quem_rec;
    }

    
    
}
