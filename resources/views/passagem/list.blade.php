@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Passagens') }}
                  <a class="btn btn-primary  ml-2" href="{{action('PassagemController@create')}}"><i class="fa fa-plus"></i> Cadastrar</a>
                </div>
                <form class="form-group" action="{{ action('PassagemController@search') }}" method="post">
                  @csrf
                  <div class="row ml-2 mr-2">
                    <h4 class="mt-2">Buscar passagem por código</h4>
                    <input class="form-control mb-2 col-10" type="text" name="codigo"/>
                    <button class="form-control btn btn-primary col-2" type="submit">Buscar</button>
                  </div>
                </form>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Código</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Voo</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($passagens as $dados)
                      <tr>
                        <td>{{$dados->id}}</td>
                        <td>{{$dados->codigo}}</td>
                        <td>{{$dados->cliente}}</td>
                        <td>{{$dados->voo}}</td>
                        <td> <a class="btn btn-primary btn-sm" href="{{action('PassagemController@edit',$dados->id)}}"><i class="fa fa-edit"></i> Editar</a></td>
                        <td> <a class="btn btn-primary btn-sm" href="{{action('PassagemController@destroy',$dados->id)}}" onclick="return confirm('Tem certeza que deseja remover?');"><i class="fa fa-trash"></i> Remover</a></td>
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
