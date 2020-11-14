<?php


Route::get('/cadpf', function () {
    return view('pf.cadpf');
})->name('site.cadpf');

Route::get('/cadastroPF', function ()
{
    return view('pf.cadastroPF');
})->name('site.cadastroPF');



Route::get('/perfilPF/chat', function ()
{
    return view('pf.chat');
})->name('perfil.chat');

Route::get('/perfilPF/candidaturas', function ()
{
    return view('pf.candidaturas');
})->name('perfil.candidaturas');

Route::get('/perfilPF/buscavagas', function ()
{
    return view('pf.busca-vaga');
})->name('perfil.buscavagas');


Route::get('detalhes1', function ()
{
    return view('pf.vagasbusca');
})->name('perfil.vagasbusca');

Route::get('detalhes2', function () 
{
    return view('pf.vagas1');
})->name('perfil.vagas1');

Route::get('/perfilPF/buscavagas/detalhes-vaga', function ()
{
    return view('pf.detalhesVaga');
})->name('perfil.detalhesvaga');

//Abrindo menu laterais

Route::get('/perfilPF/atualizardadosPG', function ()
{
    return view('pf.dados-Compra-Att');
})->name('perfil.dadosAtt');


Route::get('/perfilPF/comprarPremium', function ()
{
    return view('pf.comprar-premium');
})->name('perfil.comprar-premium');

//Rotas Ações
Route::post('/logando', 'Controlador_Login@login')->name('logar_pf');
Route::get('/perfil-pf', 'ViewsMake@perfil')->name('site.perfilPF');
Route::get('/logout', 'ViewsMake@logout')->name('logout');


Route::post('/cad-pf', 'Cadastro_Users@insertUserPF')->name('cad-pf');
Route::post('/cadCV', 'Cadastro_Users@inserindoCurriculo')->name('cadCV');


