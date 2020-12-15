<?php

namespace App\Http\Controllers;

use App\Models\AviaoModel;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
class AviaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objAviao = AviaoModel::get();

        $client = new Client();
        $url = "http://api.aviationstack.com/v1/airplanes?access_key=71544e8433e82d3a3ed706c7e6330314";

        $headers = [
            'api-key' => '71544e8433e82d3a3ed706c7e6330314'
        ];

        $response = $client->request('GET', $url, [
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('aviao.list')->with('avioes', $objAviao)->with('avioesApi', $responseBody);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aviao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objAviao = new AviaoModel();

        $objAviao->nome = $request->nome;
        $objAviao->numero_serial = $request->numero_serial;
        $objAviao->modelo = $request->modelo;
        $objAviao->marca = $request->marca;
        $objAviao->capacidade = $request->capacidade;

        $objAviao->save();

        return redirect()->action('AviaoController@index')->with('success', 'Avião salvo com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AviaoModel  $aviaoModel
     * @return \Illuminate\Http\Response
     */
    public function show(AviaoModel $aviaoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AviaoModel  $aviaoModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objAviao = AviaoModel::findOrFail($id);

        return view('aviao.edit')->with('aviao', $objAviao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AviaoModel  $aviaoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $objAviao = AviaoModel::findOrFail($request->id);

        $objAviao->nome = $request->nome;
        $objAviao->numero_serial = $request->numero_serial;
        $objAviao->modelo = $request->modelo;
        $objAviao->marca = $request->marca;
        $objAviao->capacidade = $request->capacidade;

        $objAviao->save();

        return redirect()->action('AviaoController@index')->with('success', 'Avião editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AviaoModel  $aviaoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objAviao = AviaoModel::findOrFail($id);

        $objAviao->delete();

        return redirect()->action('AviaoController@index')->with('success', 'Avião removido com sucesso.');
    }

    public function search(Request $request){
      $client = new Client();
      $url = "http://api.aviationstack.com/v1/airplanes?access_key=71544e8433e82d3a3ed706c7e6330314";

      $headers = [
          'api-key' => '71544e8433e82d3a3ed706c7e6330314'
      ];

      $response = $client->request('GET', $url, [
          'headers' => $headers,
          'verify'  => false,
      ]);

      $responseBody = json_decode($response->getBody());

      $query = DB::table('aviao');

      if (!empty($request->nome)) {
        $query->where('nome', 'like', '%' . $request->nome . '%');
      }
      if (!empty($request->numero_serial)) {
        $query->where('nome', 'like', '%' . $request->numero_serial . '%');
      }

      $objAviao = $query->orderBy('id')->get();

      return view('aviao.list')->with('avioes', $objAviao)->with('avioesApi', $responseBody);
    }
}
