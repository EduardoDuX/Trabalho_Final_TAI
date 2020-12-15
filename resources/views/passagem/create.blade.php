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
    <form action="{{action('PassagemController@store')}}" method="post" class="form-group" >
      <div class="form-row">


        @csrf
        <div class="col">
        <label for="codigo">Código</label> </br>
        <input class="form-control" type="text" name="codigo"/> </br>
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
          <label for="voo_id">Vôo</label> </br>
        <select class="form-control" name="voo_id">
          @foreach($voos as $item)
          <option value="{{$item->id}}">{{ $item->nome }} / / Passagens restantes: {{$item->capacidade - $item->ocupado}}</option>
          @endforeach
        </select>
        <p class="text-danger">{{$lotado}}</p>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
          <a href="{{url('passagem')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
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
