@section('titulopagina')
Vagas Postadas
@endsection
@extends('pj.perfilPJ')
@section('conteudoMenuLateral')
    <div class="lista-de-vagas-postadas">
        <iframe src="{{ route('perfil.listagem++') }}" frameborder="0" class="iframe-vagas-postadas"></iframe>
    </div>    
@endsection

