<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $objCliente = ClienteModel::get();

      return view('cliente.list')->with('clientes', $objCliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $objCliente = new ClienteModel();

      $objCliente->nome = $request->nome;
      $objCliente->telefone = $request->telefone;
      $objCliente->cpf = $request->cpf;
      $objCliente->email = $request->email;

      $objCliente->save();

      return redirect()->action('ClienteController@index')->with('success', 'Cliente salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteModel $clienteModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $objCliente = ClienteModel::findOrFail($id);

      return view('cliente.edit')->with('cliente', $objCliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $objCliente = ClienteModel::findOrFail($request->id);

      $objCliente->nome = $request->nome;
      $objCliente->telefone = $request->telefone;
      $objCliente->cpf = $request->cpf;
      $objCliente->email = $request->email;

      $objCliente->save();

      return redirect()->action('ClienteController@index')->with('success', 'Cliente editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClienteModel  $clienteModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $objCliente = ClienteModel::findOrFail($id);

      $objCliente->delete();

      return redirect()->action('ClienteController@index')->with('success', 'Cliente removido com sucesso.');
    }

    public function search(Request $request){
      $query = DB::table('cliente');

      if (!empty($request->nome)) {
        $query->where('nome', 'like', '%' . $request->nome . '%');
      }

      $objCliente = $query->orderBy('id')->get();

      return view('cliente.list')->with('clientes', $objCliente);

    }
}
