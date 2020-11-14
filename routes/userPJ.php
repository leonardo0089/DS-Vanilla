<?php


Route::get('/cadpj', function () {
    return view('pf.cadpj');
})->name('site.cadpj');


// Area do Usuario PJ
Route::get('/cadpj/cadastroPJ', function () 
{
    return view('pj.cadastroPJ');
})->name("site.cadastroPJc");

Route::get('/cadpj/atualizar-dados-PJ', function () 
{
    return view('pj.atualizar-dados-pj');
})->name("perfil.atualizar-dados-pj");

Route::get('/cadpj/comprar-premium-pj', function () 
{
    return view('pj.comprar-premium-pj');
})->name("perfil.comprar-premium-pj");


Route::get('/perfilPJ', function()
{
    return view('pj.perfilPJ');
})->name('site.perfilPJ');

//Rotas da navegação superior

Route::get('/perfilPJ/postar-nova-vaga', function()
{
    return view('postar-vagas-pj');
})->name('perfil.postar-vaga');


Route::get('/perfilPJ/chat-pj', function()
{
    return view('chat-pj');
})->name('perfil.chat-pj');

Route::get('/perfilPJ/vagas-postadas', function()
{
    return view('vagas-postadas-pj');
})->name('perfil.vagas-postadas-pj');

Route::get('/listagem++', function()
{
    return view('vagas-postadas-listagem');
})->name('perfil.listagem++');

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

Route::get('/cont-cadastro', function()
{
    return view('cont-cad-pj');
})->name('cont.cad-pj');

