<?php

Route::get('/cadpj', function () {
    return view('pf.cadpj');
})->name('site.cadpj');


// Area do Usuario PJ
Route::get('/perfil-pj/atualizar-dados','ViewsMake@alterarDadosView')->name("site.cadastroPJc");

Route::get('/cadpj/atualizar-dados-PJ', function () 
{
    return view('pj.atualizar-dados-pj');
})->name("perfil.atualizar-dados-pj");

Route::get('/cadpj/comprar-premium-pj', function () 
{
    return view('pj.comprar-premium-pj');
})->name("perfil.comprar-premium-pj");


//Rotas da navegação superior

Route::get('/perfilPJ/postar-nova-vaga', 'ViewsMake@novaVaga')->name('perfil.postar-vaga');


Route::get('/perfilPJ/chat-pj', function()
{
    return view('chat-pj');
})->name('perfil.chat-pj');

Route::get('/perfilPJ/vagas-postadas', 'NovaVaga@makeVagaPost')->name('perfil.vagas-postadas-pj');

Route::get('/listagem++','NovaVaga@makenewVaga')->name('perfil.listagem++');


Route::get('/perfilPJ/busca-funcionario', function()
{
    return view('busca-funcionario');
})->name('perfil.busca-funcionario');

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
Route::get('/teste', 'ViewsMake@curriculoPercent')->name('teste');
//Descrição da vaga
Route::get('/detalhes-vaga/{n_vaga}', 'NovaVaga@detalhesVagas_Postadas')->name('perfil.pj.detalhesVaga');

Route::get('/cont-cadastro', function()
{
    return view('cont-cad-pj');
})->name('cont.cad-pj');

