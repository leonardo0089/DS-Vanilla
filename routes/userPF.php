<?php


Route::get('/cadpf', function () {
    return view('pf.cadpf');
})->name('site.cadpf');

Route::get('/cadastroPF', function ()
{
    return view('pf.cadastroPF');
})->name('site.cadastroPF');


//Rota que retorna o chat
Route::get('/perfilPF/chat', 'ChatPF@conversas')->name('perfil.chat');

Route::get('/perfilPF/candidaturas', 'NovaVaga@lista_de_candidaturas_view')->name('perfil.candidaturas');
// Procurando a vaga
Route::get('/perfilPF/buscavagas', function()
{
    return view('busca-vaga');
})->name('perfil.buscando');

Route::post('/perfilPF/buscavagas/procurando', 'NovaVaga@busca_avancada')->name('perfil.buscavagas');
/*////////////////////////////////////////////////////// */

Route::get('detalhes1', function ()
{
    return view('pf.vagasbusca');
})->name('perfil.vagasbusca');

//Vagas Recomendadas
Route::get('detalhes2', 'NovaVaga@carregar_vagas_pf')->name('perfil.vagas1');

Route::get('/detalhes-vaga/{lista}/{i}','NovaVaga@dados_da_vaga_pf')->name('perfil.detalhesvaga');

//Abrindo menu laterais


//Tela de comprar Premium

Route::get('/perfilPF/comprarPremium', 'ViewsMake@recuperar_dados_boleto')->name('perfil.comprar-premium');

//Rotas Ações
Route::post('/logando', 'Controlador_Login@login')->name('logar_pf');
Route::get('/perfil-pf', 'ViewsMake@perfil')->name('site.perfilPF');
Route::get('/logout', 'ViewsMake@logout')->name('logout');


Route::post('/cad-pf', 'Cadastro_Users@insertUserPF')->name('cad-pf');
Route::post('/cadCV', 'Cadastro_Users@inserindoCurriculo')->name('cadCV');

//Rota para a atualização de Curriculo

Route::get('/atualizar-curriculo', 'ViewsMake@carregarCurriculo')->name('perfil.atualizarCV');
Route::post('/atualizando-curriculo', 'ViewsMake@atualizaCV')->name('perfil.atualizandoCV');

//Rota de Teste
Route::get('/teste01', 'ChatPF@conversas');


//Candidatando-se

Route::get('/candidatando/{id_vaga}/{fk_pj}', 'NovaVaga@candidatando_se')->name('perfil.pf.candidatar');

//Verificando candidaturas

Route::get('/vaga-candidatado/{id}/{nome}', 'NovaVaga@candidatura_vaga')->name('perfil.pf.cands');

//Cadastrando forma de Pagamento
Route::get('/perfilPF/atualizardadosPG/view', 'Cadastro_Users@cadastrar_forma_pagamento_view')->name('perfil.pf.att.pgt');
Route::post('/perfilPF/atualizardadosPG/atualizando','Cadastro_Users@cadastrar_forma_pagamento')->name('perfil.pf.cadpgto');

//Rotas do Boleto PF

Route::get('/boleto-pf', 'ViewsMake@telaBoleto1')->name('perfil.telaBoleto');

Route::get('/boleto-pf-gerado', 'ViewsMake@montandoBoleto')->name('boletoNa.tela');


//Rotas para o Chat

//Clicando na conversa
Route::get('/conversa/{id_conversa}/{id_pessoa}/{id_pf}', 'ChatPF@clicando_na_Conversa')->name('clicando.na.conversa');

//Enviando Mensagem 

Route::post('users/{id_conversa}/{id_pessoa}', 'ChatPF@enviar_Mensagem')->name('enviar.msg.pf');
