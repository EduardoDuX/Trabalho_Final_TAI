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
    <form action="{{action('AviaoController@store')}}" method="post" class="form-group" >
      <div class="form-row">


        @csrf
        <div class="col">
        <label for="nome">Nome</label> </br>
        <input class="form-control" type="text" name="nome" /> </br>
        </div>
        <div class="col">
        <label for="numero_serial">Número Serial</label> </br>
        <input class="form-control" type="text" name="numero_serial" /> </br>
        </div>
        <div class="col">
        <label for="modelo">Modelo</label> </br>
        <input class="form-control" type="text" name="modelo" /> </br>
        </div>
        <div class="col">
        <label for="marca">Marca</label> </br>
        <input class="form-control" type="text" name="marca" /> </br>
        </div><div class="col">
        <label for="capacidade">Capacidade</label> </br>
        <input class="form-control" type="text" name="capacidade" /> </br>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
          <a href="{{url('aviao')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Voltar</a>
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
