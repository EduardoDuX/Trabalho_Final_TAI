@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">{{ __('Clientes') }}
                  <a class="btn btn-primary  ml-2" href="{{action('ClienteController@create')}}"><i class="fa fa-plus"></i> Cadastrar</a>
                </div>
                <form class="form-group" action="{{ action('ClienteController@search') }}" method="post">
                  @csrf
                  <div class="row ml-2 mr-2">
                    <h4 class="mt-2">Buscar cliente por nome</h4>
                    <input class="form-control mb-2 col-10"type="text" name="nome"/>
                    <button class=" form-control btn btn-primary col-2" type="submit">Buscar</button>
                  </div>
                </form>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ação</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $dados)
                      <tr>
                        <td>{{$dados->id}}</td>
                        <td>{{$dados->nome}}</td>
                        <td>{{$dados->telefone}}</td>
                        <td>{{$dados->cpf}}</td>
                        <td>{{$dados->email}}</td>
                        <td> <a class="btn btn-primary btn-sm" href="{{action('ClienteController@edit',$dados->id)}}"><i class="fa fa-edit"></i> Editar</a></td>
                        <td> <a class="btn btn-primary btn-sm" href="{{action('ClienteController@destroy',$dados->id)}}" onclick="return confirm('Tem certeza que deseja remover?');"><i class="fa fa-trash"></i> Remover</a></td>
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
