@extends('layouts.app')

@section('content')

<?php
$dataPoints = array();
$datas = array();

foreach ($voos as $item) {
  array_push($datas, $item->data_partida);
}
$tmp = array_count_values($datas);
foreach ($tmp as $key => $value) {
  array_push($dataPoints, array("label" => $key ,'y' => $value ));
}
 ?>
 <script>
 window.onload = function () {

 var chart = new CanvasJS.Chart("chartContainer", {
 	title: {
 		text: "Vôos por dia"
 	},
 	axisY: {
 		title: "Data",
    interval: 1
 	},
 	data: [{
 		type: "line",
 		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
 	}]
 });
 chart.render();

 }
 </script>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">{{ __('Vôos') }}
                  <a class="btn btn-primary  ml-2" href="{{action('VooController@create')}}"><i class="fa fa-plus"></i> Cadastrar</a>
                </div>
                <form class="form-group" action="{{ action('VooController@search') }}" method="post">
                  @csrf
                  <div class="row ml-2 mr-2">
                    <h4 class="mt-2">Buscar voo por nome</h4>
                    <input class="form-control mb-2 col-10"type="text" name="nome"/>
                    <button class=" form-control btn btn-primary col-2" type="submit">Buscar</button>
                  </div>
                </form>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Local de Partida</th>
                          <th scope="col">Local de Destino</th>
                          <th scope="col">Data e hora de partida</th>
                          <th scope="col">Data e hora de chegada</th>
                          <th scope="col">Avião</th>
                          <th scope="col">Capacidade</th>
                          <th scope="col">Ação</th>
                          <th scope="col">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($voos as $dados)
                        <tr>
                          <td>{{$dados->id}}</td>
                          <td>{{$dados->nome}}</td>
                          <td>{{$dados->local_partida}}</td>
                          <td>{{$dados->local_destino}}</td>
                          <td>{{$dados->data_partida}}  {{$dados->hora_partida}}</td>
                          <td>{{$dados->data_chegada}}  {{$dados->hora_chegada}}</td>
                          <td>{{$dados->aviao}}</td>
                          <td><progress value="{{$dados->ocupado}}" max="{{$dados->capacidade}}"></progress></td>
                          <td> <a class="btn btn-primary btn-sm" href="{{action('VooController@edit',$dados->id)}}"><i class="fa fa-edit"></i> Editar</a></td>
                          <td> <a class="btn btn-primary btn-sm" href="{{action('VooController@destroy',$dados->id)}}" onclick="return confirm('Tem certeza que deseja remover?');"><i class="fa fa-trash"></i> Remover</a></td>
                        </tr>
                      @endforeach
                      </tbody>
                  </table>
                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
