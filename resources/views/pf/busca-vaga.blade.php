@include('pf.header')

<div class="container-do-search">
    <div class="cabecalho-do-search">
    <form class="formulario1" action="{{ route('perfil.buscavagas') }}" method="post">
            {!! csrf_field() !!}
            <div class="form-row formulario1">
                <h4>Procurar por Empresas</h4>
                <div class="col-md-12 mb-3">
                  <input type="text" class="form-control" placeholder="Digite a categoria da vaga ou apenas a inicial nos acharemos :)" id="validationServer01" name="titulo"  required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              </div>
              <button class="btn btn-light" type="submit">Buscar</button>
        </form>
        
    </div>
</div>
<div class="container-da-lista">
    @if (isset($pesq))

    
    <table class="table tabela">
        <thead class="thead-dark bg-gradient-dark">
          <tr>
            <th scope="col">N° Vagas</th>
            <th scope="col">Nome Empresa</th>
            <th scope="col">Nome da Vaga</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pesq as $key)
          <tr>
            <th scope="row">{{ $key->numero_vagas }}</th>
            <td>{{ $key->nome_fantasia }}</td>
            <td class="centro2">{{ $key->titulo_vaga }}</td>
            <td class="centro">
                <a href="{{route('perfil.detalhesvaga',[$key->id_nova_vaga, $key->nome_fantasia])}}"><button class="btn btn-danger">Visualizar</button></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
</div>



@include('pf.footer')