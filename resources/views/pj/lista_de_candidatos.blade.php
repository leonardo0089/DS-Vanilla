@extends('pj.perfilPJ')
@section('titulopagina')
Lista de Candidaturas
@endsection
@section('conteudoMenuLateral')

@if (count($dados) > 0)

<div class="container-tabela-candidaturas">
    <div class="titulo-da-listagem-cond">
        <h4>Lista de Candidaturas</h4>
    </div>
    <table class="table table-striped table-bordered">

        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Cargo Desejado</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dados as $key)
                
            
          <tr>
            
            <th scope="row">{{$key->fk_usuario_pf}}</th>
            <td>{{$key->nome_sobrenome}}</td>
            <td>{{$key->cargo_desejado}}</td>
            <td class="tamanho">
                <div class="cont-btns">
                    <a href="{{route('perfil-pf-para-pj',[$key->id])}}"><button type="button" class="btn btn-secondary">perfil</button></a>
                    <a href="{{route('chat-com-pf',[$key->fk_usuario_pf, $key->id])}}"><button type="button" class="btn btn-secondary">conversar</button></a>
                </div>
            </td>
          </tr>

          @endforeach
          
        </tbody>
      </table>
</div>
    
@else

<div class="alert alert-danger" role="alert">
    Não existem candidaturas para esta vaga
 </div>   
@endif

  
@endsection


