<?php

Route::get('/cadpj', function () {
    return view('pf.cadpj');
})->name('site.cadpj');


// Area do Usuario PJ
Route::get('/perfil-pj/atualizar-dados','ViewsMake@alterarDadosView')->name("site.cadastroPJc");

Route::get('/cadpj/atualizar-dados-PJ', 'FuncoesPJ@makeViewattPagPJ')->name("perfil.atualizar-dados-pj");

//Comprar o Premium e geração do boleto
Route::get('/cadpj/comprar-premium-pj','FuncoesPJ@makeViewComprarPremiumPJ')->name("perfil.comprar-premium-pj");


//Rotas da navegação superior

Route::get('/perfilPJ/postar-nova-vaga', 'ViewsMake@novaVaga')->name('perfil.postar-vaga');


Route::get('/perfilPJ/chat-pj','FuncoesPJ@makeViewChat')->name('perfil.chat-pj');

Route::get('/perfilPJ/vagas-postadas', 'NovaVaga@makeVagaPost')->name('perfil.vagas-postadas-pj');

Route::get('/listagem++','NovaVaga@makenewVaga')->name('perfil.listagem++');


Route::get('/perfilPJ/busca-funcionario','FuncoesPJ@makeViewBuscaFunc')->name('perfil.busca-funcionario');
//Realizar Busca
Route::post('/perfilPJ/busca-realizada','FuncoesPJ@searchFuncionario')->name('perfil.realizar-busca');

Route::get('/busca++--', function()
{
    return view('pj-perfil-funcionario');
})->name('perfil.perfil-do-funcionario');


//Cadastrando nova Pessoa Juridica
Route::post('/cad-pj', 'Cadastro_Users@insertUserPJ')->name('cad-pj');
Route::post('/cad-pj/cont', 'Cadastro_Users@saveNewPJ')->name('cad-pj-cont');
Route::post('/perfil-pj/Atualizando-cadastro', 'Cadastro_Users@attPJCad')->name('att.pjcad');

Route::get('/perfil-pj', 'ViewsMake@perfil')->name('dash.perfil');
//Cadastrando nova vaga
Route::post('/cadastrando', 'NovaVaga@cadastrarVaga')->name('perfil.cadVaga');

//View da vaga
Route::get('/editar-vaga/{id_vaga}', 'NovaVaga@carregar_Alterar')->name('carregar.alterar');

//Atualizador de vagas

Route::post('/atualizando-vaga/{id_da_vaga}', 'NovaVaga@atualizar_Vaga')->name('carregar.salvando.alteracao');

//Rota de teste
Route::get('/teste', 'ChatPJ@makeViewChat')->name('teste');
//Descrição da vaga
Route::get('/detalhes-vaga/{n_vaga}', 'NovaVaga@detalhesVagas_Postadas')->name('perfil.pj.detalhesVaga');

Route::get('/cont-cadastro', function()
{
    return view('cont-cad-pj');
})->name('cont.cad-pj');

//Rota para Iserir ou Atualizar dados de Pagamento

Route::any('/atualizando-pj-pgto','FuncoesPJ@insertOrUpdate')->name('perfilPJ.insertoOrUpdate');

//Rotas para o Boleto PJ

Route::get('/criacao-boleto', 'FuncoesPJ@telaBoleto1')->name('perfil.pj.telaBoleto');

Route::get('/boleto-montado', 'FuncoesPJ@montandoBoleto')->name('boletoNa.tela1');

//Perfil do Usuario PF mostrado para o usuario PJ

Route::get('/perfil-do-pf/{id}', 'FuncoesPJ@mostrarDadosUser')->name('perfil-pf-para-pj');


//Rota para conversa

Route::get('/chat/{idpf}/{id}', 'FuncoesPJ@novaConversa')->name('chat-com-pf');
Route::get('/conversa/{nome}/{id_conversa}', 'FuncoesPJ@entrarConversa')->name('na.conversa');
Route::get('/mensagens/{id}', 'FuncoesPJ@index')->name('msgs');

//View Interna
Route::get('/load', 'FuncoesPJ@viewInterna')->name('interna');

Route::post('/msg/{id_chat}/{id_pf}/{nome}/{idc}','FuncoesPJ@enviarMsg')->name('enviar.msg');

//Rotas para mostrar ao usuario todas as candidaturas para a vaga postada

Route::get('/lista-candidaturas/{id_vaga}/{id_pj}', 'FuncoesPJ@viewCandidaturas')->name('candidaturas.view');
