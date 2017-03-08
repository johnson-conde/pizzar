<?php

use Illuminate\Http\Request;
use App\Categoria;
use App\Pizzaria;
use App\Produto;
use App\Encomenda;
use App\ItemDaEncomenda;
use Illuminate\Support\Facades\Validator;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the 'api' middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pizzarias', function(){
  $data = Pizzaria::all();
  return response()->json($data);
});

Route::get('/categorias', function(){
  $data = Categoria::all();
  return response()->json($data);
});

Route::get('/produtos', function(){
  return Produto::all();
});

Route::get('/produtos/{pizzaria_id}', function(String $pizzaria_id){
   return Produto::where('pizzaria_id', $pizzaria_id)->orderBy('created_at', 'asc')->get();
});

Route::get('/encomendas', function(){
  return Encomenda::all();
});

Route::get('/encomendas/{pizzaria_id}', function(String $pizzaria_id){
   return Encomenda::where('pizzaria_id', $pizzaria_id)->orderBy('created_at', 'asc')->get();
});

Route::post('/encomendar', function(Request $request){
  $rules = [
    'pizzaria_id' => 'required|numeric',
    'usuario_id' => 'required|numeric',
    'pontos_de_entrega_id' => 'required|numeric',
    'metodo_de_pagamento_id' => 'required|numeric',
    'comentario' => 'required',
  ];

  $validator = Validator::make($request->only([
              'pizzaria_id','usuario_id','pontos_de_entrega_id',
              'metodo_de_pagamento_id','comentario']
              ), $rules);
  if($validator->fails()){
    return response()->json([
      'erro' => '500',
      'mensagens' =>$validator->messages()
    ]);
  }else{
    $data = $request->all();
    $data['subtotal'] = 0;
    $data['total'] = 0;
    $encomenda = Encomenda::create($data);
    $subtotal = null;
    foreach ($data['produto_id'] as $key => $produto_id) {
      $produto= Produto::find($produto_id);
      $items_da_encomenda = new ItemDaEncomenda;
      $items_da_encomenda->produto_id = $produto->id;
      $items_da_encomenda->quantidade = $data['quantidade'][$key];
      $items_da_encomenda->subtotal = intval($data['quantidade'][$key])  * $produto->preco;
      $subtotal += $items_da_encomenda->subtotal;
      $items = $encomenda->itemsDaEncomenda()->save($items_da_encomenda);
    }

    $data['subtotal'] = $subtotal;
    $data['total'] = $subtotal;
    $encomenda->update($data);
    return response()->json([
      'erro' => '500',
      'data' => Encomenda::with('itemsDaEncomenda')->find($encomenda->id)
    ]);
  }
});
