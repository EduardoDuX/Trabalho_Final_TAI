<?php

namespace App\Http\Controllers;

use App\Models\VooModel;
use App\Models\AviaoModel;
use App\Models\PassagemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VooController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $objVoo = VooModel::get();

      foreach ($objVoo as $item) {
        $aviao = AviaoModel::findOrFail($item->aviao_id);
        $item->aviao = $aviao->nome;
        $item->capacidade = $aviao->capacidade;

        $passagens = PassagemModel::get();
        $item->ocupado = 0;
        foreach ($passagens as $passagem) {
          if ($passagem->voo_id == $item->id) {
            $item->ocupado++;
          }
        }
      }

      return view('voo.list')->with('voos', $objVoo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objAviao = AviaoModel::get();

        return view('voo.create')->with('avioes', $objAviao);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $objVoo = new VooModel();

      $objVoo->nome = $request->nome;
      $objVoo->local_partida = $request->local_partida;
      $objVoo->local_destino = $request->local_destino;
      $objVoo->data_partida = $request->data_partida;
      $objVoo->data_chegada = $request->data_chegada;
      $objVoo->hora_partida = $request->hora_partida;
      $objVoo->hora_chegada = $request->hora_chegada;
      $objVoo->aviao_id = $request->aviao_id;

      $objVoo->save();

      return redirect()->action('VooController@index')->with('success', 'Vôo salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VooModel  $vooModel
     * @return \Illuminate\Http\Response
     */
    public function show(VooModel $vooModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VooModel  $vooModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $objVoo = VooModel::findOrFail($id);

      $objAviao = AviaoModel::get();

      return view('voo.edit')->with('voo', $objVoo)->with('avioes', $objAviao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VooModel  $vooModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $objVoo = VooModel::findOrFail($request->id);

      $objVoo->nome = $request->nome;
      $objVoo->local_partida = $request->local_partida;
      $objVoo->local_destino = $request->local_destino;
      $objVoo->data_partida = $request->data_partida;
      $objVoo->data_chegada = $request->data_chegada;
      $objVoo->hora_partida = $request->hora_partida;
      $objVoo->hora_chegada = $request->hora_chegada;
      $objVoo->aviao_id = $request->aviao_id;

      $objVoo->save();

      return redirect()->action('VooController@index')->with('success', 'Vôo editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VooModel  $vooModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $objVoo = VooModel::findOrFail($id);

      $objVoo->delete();

      return redirect()->action('VooController@index')->with('success', 'Vôo removido com sucesso.');
    }
    public function search(Request $request){
      $query = DB::table('voo');

      if (!empty($request->nome)) {
        $query->where('nome', 'like', '%' . $request->nome . '%');
      }

      $objVoo = $query->orderBy('id')->get();

      foreach ($objVoo as $item) {
        $aviao = AviaoModel::findOrFail($item->aviao_id);
        $item->aviao = $aviao->nome;
        $item->capacidade = $aviao->capacidade;

        $passagens = PassagemModel::get();
        $item->ocupado = 0;
        foreach ($passagens as $passagem) {
          if ($passagem->voo_id == $item->id) {
            $item->ocupado++;
          }
      }

      }

      return view('voo.list')->with('voos', $objVoo);

    }
}
