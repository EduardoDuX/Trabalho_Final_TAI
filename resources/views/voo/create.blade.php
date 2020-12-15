@extends('./../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulário Vôo') }}</div>

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
    <form action="{{action('VooController@store')}}" method="post" class="form-group" >
      <div class="form-row">


        @csrf
        <div class="col-12">
        <label for="nome">Nome</label> </br>
        <input class="form-control" type="text" name="nome"/> </br>
        </div>

        <div class="col-12">
        <label for="local_partida">Local de Partida</label> </br>
        <input class="form-control" type="text" name="local_partida"/> </br>
        </div>

        <div class="col-12">
        <label for="local_destino">Local de Destino</label> </br>
        <input class="form-control" type="text" name="local_destino"/> </br>
        </div>

        <div class="col-12">
        <label for="data_partida">Data de partida</label> </br>
        <input class="form-control" type="text" name="data_partida"/> </br>
        </div>

        <div class="col-12">
        <label for="data_chegada">Data de chegada</label> </br>
        <input class="form-control" type="text" name="data_chegada"/> </br>
        </div>

        <div class="col">
        <label for="hora_partida">Hora de partida</label> </br>
        <input class="form-control" type="text" name="hora_partida"/> </br>
        </div>

        <div class="col-12">
        <label for="hora_chegada">Hora de chegada</label> </br>
        <input class="form-control" type="text" name="hora_chegada"/> </br>
        </div>


        <div class="col-12 mb-3">
          <label for="aviao_id">Avião</label> </br>
        <select class="form-control" name="aviao_id">
          @foreach($avioes as $item)
          <option value="{{$item->id}}">{{ $item->nome }}</option>
          @endforeach
        </select>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
          <a href="{{url('voo')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
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
