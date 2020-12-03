<style>
.container-da-lista2
{
  display: flex;
  flex-direction: column;
  align-items: center
}
</style>
@include('pj.headerpj')
<div class="container-do-search">
    <div class="cabecalho-do-search">
    <form class="formulario1" action="{{ route('perfil.realizar-busca') }}" method="post">
            {!! csrf_field() !!}
            <div class="form-row formulario1">
                <h4>Procurar por Funcionario</h4>
                <div class="col-md-12 mb-3">
                  <input type="text" placeholder="Pesquise o funcionario pela categoria Ex(Analista de Sistemas)." class="form-control" id="validationServer01" name="titulo"  required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              </div>
              <button class="btn btn-light" type="submit">Buscar</button>
        </form>
        
    </div>
</div>
<div class="container-da-lista2">
    @if (isset($pesq))

    
    <table class="table tabela">
        <thead class="thead-dark bg-gradient-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Funcionario</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pesq as $key)
          <tr>
            <th scope="row">{{ $key->id_pf }}</th>
            <th scope="row">{{ $key->nome_sobrenome }}</th>
            <th scope="row">{{ $key->nome_categoria }}</th>
            <td class="centro">
                <a href="{{route('perfil-pf-para-pj',[$key->id])}}"><button class="btn btn-outline-danger">Visualizar</button></a>
                <a href="{{route('chat-com-pf',[$key->id_pf, $key->id])}}"><button class="btn btn-outline-danger">Conversar</button></a>
            </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
      @endif
      
@include('pj.footerpj')


