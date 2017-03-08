<?php
use App\Pizzaria;
use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Auth;

Route::name("pizzaria.dashboard")->get('/dashboard', ["uses" =>"Client\PizzariasController@dashboard"]);
Route::name("pizzaria.profile")->get('/profile', ["uses" =>"Client\PizzariasController@profile"]);
Route::name("pizzaria.login")->get('/login', ["uses" =>"Client\PizzariasAuth\LoginController@showLoginForm"]);
Route::name("pizzaria.login.post")->post('/login', ["uses" =>"Client\PizzariasAuth\LoginController@login"]);
Route::name("pizzaria.cadastrar")->get('/cadastrar', ["uses" =>"Client\PizzariasAuth\RegisterController@showRegistrationForm"]);
Route::name("pizzaria.cadastrar.post")->post('/cadastrar', ["uses" =>"Client\PizzariasAuth\RegisterController@register"]);
Route::name("pizzaria.logout")->post('/logout', ["uses" =>"Client\PizzariasAuth\LoginController@logout"]);

// Route::name("pizzarias.index")->get('', ["uses" =>"Client\PizzariasController@index"]);
// Route::name("pizzarias.create.get")->get('/criar', ["uses" =>"Client\PizzariasController@create"]);
// Route::name("pizzarias.create.post")->post('', ["uses" =>"Client\PizzariasController@store"]);
// Route::name("pizzarias.show")->get('/show/{id}', ["uses" =>"Client\PizzariasController@show"]);
// Route::name("pizzarias.edit.get")->get('/pizzarias/edit/{id}', ["uses" =>"Client\PizzariasController@edit"]);
// Route::name("pizzarias.edit.post")->post('/edit/{id}', ["uses" =>"Client\PizzariasController@update"]);


Route::name("produtos.index")->get('/produtos', ["uses" =>"Client\PizzariasController@getProdutos"]);
Route::name("produtos.show")->get('/mostrar/produto/{produto_id}',  'Client\PizzariasController@showProduto');
Route::name("produtos.create.get")->get('/criar/produto',  'Client\PizzariasController@createProduto');
Route::name("produtos.create.post")->post('/criar/produto', 'Client\PizzariasController@storeProduto');
Route::name("produtos.edit.get")->get('/modificar/produto/{produto_id}',  'Client\PizzariasController@editProduto');
Route::name("produtos.edit.post")->post('/modificar/produto/{produto_id}', 'Client\PizzariasController@updateProduto');
Route::name("produtos.edit.imagem")->post('/modificar/produto/{produto_id}/imagem', 'Client\PizzariasController@updateProdutoImagem');
Route::name("produtos.delete")->get('/deletar/produto/{produto_id}', 'Client\PizzariasController@destroyProduto');

Route::name("encomendas.index")->get('/encomendas', ["uses" =>"Client\PizzariasController@getEncomendas"]);
Route::name("encomendas.show")->get('/mostrar/encomenda/{encomenda_id}',  'Client\PizzariasController@showEncomenda');
Route::name("encomendas.create.get")->get('/criar/encomenda',  'Client\PizzariasController@createEncomenda');
Route::name("encomendas.create.post")->post('/criar/encomenda', 'Client\PizzariasController@storeEncomenda');
Route::name("encomendas.edit.get")->get('/modificar/encomenda/{encomenda_id}',  'Client\PizzariasController@editEncomenda');
Route::name("encomendas.edit.post")->post('/modificar/encomenda/{encomenda_id}', 'Client\PizzariasController@updateEncomenda');
Route::name("encomendas.delete")->get('/deletar/encomenda/{encomenda_id}', 'Client\PizzariasController@destroyEncomenda');
