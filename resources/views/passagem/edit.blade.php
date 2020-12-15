@extends('./../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">{{ __('Formulário Passagem') }}</div>

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
    <form class="form-group" action="{{action('PassagemController@update')}}" method="post">
        @csrf
        <div class="form-row">


        <input type="hidden" name="id" value="{{$passagem->id}}"/>

        <div class="col">
        <label for="codigo">Código</label> </br>
        <input class="form-control" type="text" name="codigo" value="{{$passagem->codigo}}"/> </br>
        </div>

        <div class="col-12 mb-3">
          <label for="cliente_id">Cliente</label> </br>
        <select class="form-control" name="cliente_id">
          @foreach($clientes as $item)
          <option value="{{$item->id}}">{{ $item->nome }}</option>
          @endforeach
        </select>
        </div>

        <div class="col-12 mb-3">
          <label for="voo_id">Código do Vôo</label> </br>
        <select class="form-control" name="voo_id">
          @foreach($voos as $item)
          <option value="{{$item->id}}">{{ $item->id }}</option>
          @endforeach
        </select>
        </div>

        <button class="btn btn-primary" type="submit">Atualizar</button>
        <a class="btn btn-primary ml-2" href="{{url('voo')}}">Voltar</a>
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
