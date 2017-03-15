<?php
use App\Pizzaria;
use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Auth;

Route::name("pizzaria.dashboard")->get('/dashboard', ["uses" =>"Pizzarias\PizzariasController@dashboard"]);
Route::name("pizzaria.profile")->get('/profile', ["uses" =>"Pizzarias\PizzariasController@profile"]);
Route::name("pizzaria.login")->get('/login', ["uses" =>"Pizzarias\PizzariasAuth\LoginController@showLoginForm"]);
Route::name("pizzaria.login.post")->post('/login', ["uses" =>"Pizzarias\PizzariasAuth\LoginController@login"]);
Route::name("pizzaria.cadastrar")->get('/cadastrar', ["uses" =>"Pizzarias\PizzariasAuth\RegisterController@showRegistrationForm"]);
Route::name("pizzaria.cadastrar.post")->post('/cadastrar', ["uses" =>"Pizzarias\PizzariasAuth\RegisterController@register"]);
Route::name("pizzaria.logout")->post('/logout', ["uses" =>"Pizzarias\PizzariasAuth\LoginController@logout"]);

// Route::name("pizzarias.index")->get('', ["uses" =>"Pizzarias\PizzariasController@index"]);
// Route::name("pizzarias.create.get")->get('/criar', ["uses" =>"Pizzarias\PizzariasController@create"]);
// Route::name("pizzarias.create.post")->post('', ["uses" =>"Pizzarias\PizzariasController@store"]);
// Route::name("pizzarias.show")->get('/show/{id}', ["uses" =>"Pizzarias\PizzariasController@show"]);
// Route::name("pizzarias.edit.get")->get('/pizzarias/edit/{id}', ["uses" =>"Pizzarias\PizzariasController@edit"]);
// Route::name("pizzarias.edit.post")->post('/edit/{id}', ["uses" =>"Pizzarias\PizzariasController@update"]);


Route::name("produtos.index")->get('/produtos', ["uses" =>"Pizzarias\PizzariasController@getProdutos"]);
Route::name("produtos.show")->get('/mostrar/produto/{produto_id}',  'Pizzarias\PizzariasController@showProduto');
Route::name("produtos.create.get")->get('/criar/produto',  'Pizzarias\PizzariasController@createProduto');
Route::name("produtos.create.post")->post('/criar/produto', 'Pizzarias\PizzariasController@storeProduto');
Route::name("produtos.edit.get")->get('/modificar/produto/{produto_id}',  'Pizzarias\PizzariasController@editProduto');
Route::name("produtos.edit.post")->post('/modificar/produto/{produto_id}', 'Pizzarias\PizzariasController@updateProduto');
Route::name("produtos.edit.imagem")->post('/modificar/produto/{produto_id}/imagem', 'Pizzarias\PizzariasController@updateProdutoImagem');
Route::name("produtos.delete")->get('/deletar/produto/{produto_id}', 'Pizzarias\PizzariasController@destroyProduto');

Route::name("encomendas.index")->get('/encomendas', ["uses" =>"Pizzarias\PizzariasController@getEncomendas"]);
Route::name("encomendas.show")->get('/mostrar/encomenda/{encomenda_id}',  'Pizzarias\PizzariasController@showEncomenda');
Route::name("encomendas.create.get")->get('/criar/encomenda',  'Pizzarias\PizzariasController@createEncomenda');
Route::name("encomendas.create.post")->post('/criar/encomenda', 'Pizzarias\PizzariasController@storeEncomenda');
Route::name("encomendas.edit.get")->get('/modificar/encomenda/{encomenda_id}',  'Pizzarias\PizzariasController@editEncomenda');
Route::name("encomendas.edit.post")->post('/modificar/encomenda/{encomenda_id}', 'Pizzarias\PizzariasController@updateEncomenda');
Route::name("encomendas.delete")->get('/deletar/encomenda/{encomenda_id}', 'Pizzarias\PizzariasController@destroyEncomenda');
