@extends('./../layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">{{ __('Aviões') }}
                  <a class="btn btn-primary  ml-2" href="{{action('AviaoController@create')}}"><i class="fa fa-plus"></i> Cadastrar</a>
                </div>
                <form class="form-group" action="{{ action('AviaoController@search') }}" method="post">
                  @csrf
                  <div class="row ml-2 mr-2">
                    <h4 class="mt-2">Buscar avião por nome</h4>
                    <input class="form-control mb-2 col-10"type="text" name="nome"/>
                    <button class=" form-control btn btn-primary col-2" type="submit">Buscar Avião</button>
                  </div>
                </form>

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Numero Serial</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Capacidade</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($avioes as $dados)
                      <tr>
                        <td>{{$dados->id}}</td>
                        <td>{{$dados->nome}}</td>
                        <td>{{$dados->numero_serial}}</td>
                        <td>{{$dados->modelo}}</td>
                        <td>{{$dados->marca}}</td>
                        <td>{{$dados->capacidade}}</td>
                        <td> <a class="btn btn-primary btn-sm" href="{{action('AviaoController@edit',$dados->id)}}"><i class="fa fa-edit"></i> Editar</a></td>
                        <td> <a class="btn btn-primary btn-sm" href="{{action('AviaoController@destroy',$dados->id)}}" onclick="return confirm('Tem certeza que deseja remover?');"><i class="fa fa-trash"></i> Remover</a></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <h3 class='bg-primary text-white ml-2 mr-2' style="border-radius: 10px;background: #73AD21; text-align: center">Os Aviões aparecendo na seção abaixo são de companias de terceiros, e podem ser alugados para vôos particulares, para isto o cliente deve entrar em contato conosco via email</h3>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Numero Serial</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Idade do avião</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($avioesApi->data as $dados)
                      <tr>
                        <td>{{$dados->registration_number}}</td>
                        <td>{{$dados->production_line}}</td>
                        <td>{{$dados->model_code}}</td>
                        <td>{{$dados->model_name}}</td>
                        @if($dados->plane_owner == null)
                        <td><b>A marca prefere não se identificar</b></td>
                        @else
                        <td>{{$dados->plane_owner}}</td>
                        @endif
                        <td>{{$dados->plane_age}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
