@extends('./../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">{{ __('Formulário Cliente') }}</div>

                <div class="card-body">
    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-group" action="{{action('ClienteController@update')}}" method="post">
        @csrf
        <div class="form-row">


        <input type="hidden" name="id" value="{{$cliente->id}}"/>
        <div class="col">
        <label for="nome">Nome</label> </br>
        <input class="form-control" type="text" name="nome" value="{{$cliente->nome}}"/> </br>
        </div>

        <div class="col">
        <label for="telefone">Telefone</label> </br>
        <input class="form-control" type="text" name="telefone" value="{{$cliente->telefone}}"/> </br>
        </div>

        <div class="col">
        <label for="cpf">CPF</label> </br>
        <input class="form-control" type="text" name="cpf" value="{{$cliente->cpf}}"/> </br>
        </div>

        <div class="col-12">
        <label for="email">Email</label> </br>
        <input class="form-control" type="text" name="email" value="{{$cliente->email}}"/> </br>
        </div>

        <button class="btn btn-primary" type="submit">Atualizar</button>
        <a class="btn btn-primary ml-2" href="{{url('cliente')}}">Voltar</a>
          </div>
        </div>
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
    @endsection
