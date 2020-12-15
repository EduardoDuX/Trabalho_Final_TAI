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
    <form class="form-group" action="{{action('AviaoController@update')}}" method="post">
        @csrf
        <div class="form-row">


        <input type="hidden" name="id" value="{{$aviao->id}}"/>
        <div class="col">
        <label for="nome">Nome</label> </br>
        <input class="form-control" type="text" name="nome" value="{{$aviao->nome}}"/> </br>
        </div>

        <div class="col">
        <label for="numero_serial">Número Serial</label> </br>
        <input class="form-control" type="text" name="numero_serial" value="{{$aviao->numero_serial}}"/> </br>
        </div>

        <div class="col">
        <label for="modelo">Modelo</label> </br>
        <input class="form-control" type="text" name="modelo" value="{{$aviao->modelo}}"/> </br>
        </div>

        <div class="col-12">
        <label for="marca">Marca</label> </br>
        <input class="form-control" type="text" name="marca" value="{{$aviao->marca}}"/> </br>
        </div>

        <div class="col-12">
        <label for="capacidade">Capacidade</label> </br>
        <input class="form-control" type="text" name="capacidade" value="{{$aviao->capacidade}}"/> </br>
        </div>

        <button class="btn btn-primary" type="submit">Atualizar</button>
        <a class="btn btn-primary ml-2" href="{{url('aviao')}}">Voltar</a>
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
