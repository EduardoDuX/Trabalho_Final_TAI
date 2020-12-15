@extends('./../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">{{ __('Formulário Avião') }}</div>

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
    <form class="form-group" action="{{action('VooController@update')}}" method="post">
        @csrf
        <div class="form-row">


        <input type="hidden" name="id" value="{{$voo->id}}"/>
        <div class="col-12">
        <label for="nome">Nome</label> </br>
        <input class="form-control" type="text" name="nome" value="{{$voo->nome}}"/> </br>
        </div>

        <div class="col-12">
        <label for="local_partida">Local de Partida</label> </br>
        <input class="form-control" type="text" name="local_partida" value="{{$voo->local_partida}}"/> </br>
        </div>

        <div class="col-12">
        <label for="local_destino">Local de Destino</label> </br>
        <input class="form-control" type="text" name="local_destino" value="{{$voo->local_destino}}"/> </br>
        </div>

        <div class="col-12">
        <label for="data_partida">Data de partida</label> </br>
        <input class="form-control" type="text" name="data_partida" value="{{$voo->data_partida}}"/> </br>
        </div>

        <div class="col-12">
        <label for="data_chegada">Data de chegada</label> </br>
        <input class="form-control" type="text" name="data_chegada" value="{{$voo->data_chegada}}"/> </br>
        </div>

        <div class="col-12">
        <label for="hora_partida">Hora de partida</label> </br>
        <input class="form-control" type="text" name="hora_partida" value="{{$voo->hora_partida}}"/> </br>
        </div>

        <div class="col-12">
        <label for="hora_chegada">Hora de chegada</label> </br>
        <input class="form-control" type="text" name="hora_chegada" value="{{$voo->hora_chegada}}"/> </br>
        </div>

        <div class="col-12 mb-3">
          <label for="aviao_id">Avião</label> </br>
        <select class="form-control" name="aviao_id">
          @foreach($avioes as $item)
          <option value="{{$item->id}}">{{ $item->nome }}</option>
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
