<?php

namespace App\Http\Controllers;

use App\Models\PassagemModel;
use App\Models\VooModel;
use App\Models\AviaoModel;
use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PassagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $objPassagem = PassagemModel::get();

      foreach ($objPassagem as $item) {
        $cliente = ClienteModel::find($item->cliente_id);
        $voo = VooModel::find($item->voo_id);
        if ($cliente == NULL) {
          $item->cliente = "O cliente cancelou a passagem!";
        } else {
          $item->cliente = $cliente->nome;
        }
        if ($voo == NULL) {
          $item->voo = "Vôo cancelado!";
        } else {
          $item->voo = $voo->nome;
        }

      }


      return view('passagem.list')->with('passagens', $objPassagem);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $objCliente = ClienteModel::get();
      $objVoo = VooModel::get();

      foreach ($objVoo as $item) {
        $aviao = AviaoModel::findOrFail($item->aviao_id);
        $item->capacidade = $aviao->capacidade;

        $passagens = PassagemModel::get();
        $item->ocupado = 0;
        foreach ($passagens as $passagem) {
          if ($passagem->voo_id == $item->id) {
            $item->ocupado++;
          }
      }

      }

      return view('passagem.create')->with('clientes', $objCliente)->with('voos', $objVoo)->with('lotado', '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $objVoo = VooModel::get();
      $objCliente = ClienteModel::get();

      foreach ($objVoo as $item) {
        $aviao = AviaoModel::findOrFail($item->aviao_id);
        $item->capacidade = $aviao->capacidade;

        $passagens = PassagemModel::get();
        $item->ocupado = 0;
        foreach ($passagens as $passagem) {
          if ($passagem->voo_id == $item->id) {
            $item->ocupado++;
                  }
              }
        }
      foreach ($objVoo as $item) {
        if ($item->id == $request->voo_id) {
          $disponibilidade = $item->capacidade - $item->ocupado;
          if ($disponibilidade == 0) {
            return view('passagem.create')->with('clientes', $objCliente)->with('voos', $objVoo)->with('lotado', 'Desculpe, o vôo selecionado está lotado, por favor escolha outro vôo');
          }else{
            $objPassagem = new PassagemModel();

            $objPassagem->codigo = $request->codigo;
            $objPassagem->cliente_id = $request->cliente_id;
            $objPassagem->voo_id = $request->voo_id;

            $objPassagem->save();

            return redirect()->action('PassagemController@index')->with('success', 'Passagem salva com sucesso.');
          }
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PassagemModel  $passagemModel
     * @return \Illuminate\Http\Response
     */
    public function show(PassagemModel $passagemModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PassagemModel  $passagemModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $objPassagem = PassagemModel::findOrFail($id);

      $objVoo = VooModel::get();
      $objCliente = ClienteModel::get();

      return view('passagem.edit')->with('passagem', $objPassagem)->with('voos', $objVoo)->with('clientes', $objCliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PassagemModel  $passagemModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $objPassagem = PassagemModel::findOrFail($request->id);

      $objPassagem->codigo = $request->codigo;
      $objPassagem->cliente_id = $request->cliente_id;
      $objPassagem->voo_id = $request->voo_id;

      $objPassagem->save();

      return redirect()->action('PassagemController@index')->with('success', 'Passagem editada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PassagemModel  $passagemModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $objPassagem = PassagemModel::findOrFail($id);

      $objPassagem->delete();

      return redirect()->action('PassagemController@index')->with('success', 'Passagem removida com sucesso.');
    }

    public function search(Request $request){

        $query = DB::table('passagem');

        $query->where('codigo', 'like', '%' . $request->codigo . '%');

        $objPassagem = $query->orderBy('id')->get();

      foreach ($objPassagem as $item) {
        $cliente = ClienteModel::find($item->cliente_id);
        $voo = VooModel::find($item->voo_id);
        $item->cliente = $cliente->nome;
        $item->voo = $voo->id;
      }

      return view('passagem.list')->with('passagens', $objPassagem);

    }

}
