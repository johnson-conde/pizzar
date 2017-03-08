<?php
use App\Pizzaria;
use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::name("home")->get('/', ["uses" =>"Client\HomeController@index"]);
Route::name("admin.home")->get('/admin/home', ["uses" =>"Client\AdminController@home"]);
Route::get('/perfil', function(){
  return view('pizzarias.perfil');
})->name("pizzarias.perfil");

Auth::routes();
