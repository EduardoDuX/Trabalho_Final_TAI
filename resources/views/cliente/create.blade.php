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
    <form action="{{action('ClienteController@store')}}" method="post" class="form-group" >
      <div class="form-row">


        @csrf
        <div class="col">
        <label for="nome">Nome</label> </br>
        <input class="form-control" type="text" name="nome"/> </br>
        </div>

        <div class="col">
        <label for="telefone">Telefone</label> </br>
        <input class="form-control" type="text" name="telefone"/> </br>
        </div>

        <div class="col">
        <label for="cpf">CPF</label> </br>
        <input class="form-control" type="text" name="cpf"/> </br>
        </div>

        <div class="col-12">
        <label for="email">Email</label> </br>
        <input class="form-control" type="text" name="email"/> </br>
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
