<?php

namespace App\Http\Controllers\Client;

use App\Pizzaria;
use App\Produto;
use App\Categoria;
use App\Encomenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PizzariasController extends Controller
{
    public $guard;
    public function __construct()
    {
      $this->guard = Auth::guard("pizzaria");
      $this->middleware('pizzaria');
    }
    public function dashboard()
    {
      if (!Auth::guard("pizzaria")->check()) {
        return redirect(route("pizzaria.login"));
      }

      $pizzaria = Auth::guard('pizzaria')->user();

      return view('pizzarias.dashboard', compact('pizzaria'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzarias = Pizzaria::latest()->paginate(5);
        return view('pizzarias.index', compact('pizzarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzarias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novaPizzaria = Pizzaria::create($request->all());
        return redirect(route('pizzarias.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pizzaria  $pizzaria
     * @return \Illuminate\Http\Response
     */
    public function profile(Pizzaria $pizzaria)
    {
        $pizzaria = Auth::guard("pizzaria")->user();
        return view('pizzarias.show', compact("pizzaria"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizzaria  $pizzaria
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizzaria $pizzaria)
    {
        $pizzaria = Pizzaria::where("pizzaria_id", $id)->first();
        return view('pizzarias.edit', compact("pizzaria"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizzaria  $pizzaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizzaria $pizzaria)
    {
        $pizzaria = Pizzaria::where("pizzaria_id", $id)->first();
        return redirect(route('pizzarias.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizzaria  $pizzaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizzaria $pizzaria)
    {
        //
    }

    public function getProdutos(){
      if (!Auth::guard("pizzaria")->check()) {
        return redirect(route("pizzaria.login"));
      }
      $pizzaria_id = Auth::guard('pizzaria')->user()->id;
      $produtos = Produto::where('pizzaria_id',$pizzaria_id)->latest()->paginate(10);
      return view('pizzarias.produtos.index', compact('produtos'));
    }

    public function createProduto(Request $request)
    {
      $pizzaria_id = Auth::guard('pizzaria')->user()->id;
      $pizzaria = Pizzaria::with("produtos")->find($pizzaria_id);
      $categorias = Categoria::pluck("nome","id");
      return view("pizzarias.produtos.create", compact("pizzaria", "categorias"));
    }

    public function storeProduto(Request $request)
    {
      $pizzaria_id = Auth::guard('pizzaria')->user()->id;
      $pizzaria = Pizzaria::with("produtos")->find($pizzaria_id);
      $data = $request->all();
      $data = uploadImage($data, 'imagem');
      $produto = Produto::create($data);
      $pizzaria->produtos()->save($produto);
      return redirect()->route("produtos.index");
    }

    public function showProduto(Request $request, $produto_id)
    {
      $produto = Produto::find($produto_id);
      return view("pizzarias.produtos.show", compact("produto"));
    }

    public function editProduto(Request $request, $produto_id)
    {
      $produto = Produto::find($produto_id);
      $categorias = Categoria::pluck("nome","id");
      return view("pizzarias.produtos.edit", compact("produto", "categorias"));
    }

    public function updateProduto(Request $request, $produto_id)
    {
      $produto = Produto::find($produto_id);
      $produto->update($request->all());
      return redirect()->route("produtos.show", $produto_id);
    }

    public function updateProdutoImagem(Request $request, $produto_id)
    {
      $produto = Produto::find($produto_id);
      $data = $request->all();
      $data = uploadImage($data, 'imagem');
      $produto = $produto->update($data);
      return redirect()->route("produtos.edit.get", $produto_id);
    }

    public function destroyProduto(Request $request, $produto_id)
    {
      $produto = Produto::find($produto_id);
      $produto->delete();
      return redirect()->route("produtos.index");
    }

    public function getEncomendas(){
      if (!Auth::guard("pizzaria")->check()) {
        return redirect(route("pizzaria.login"));
      }
      $pizzaria_id = Auth::guard('pizzaria')->user()->id;
      $encomendas = Encomenda::where('pizzaria_id',$pizzaria_id)->latest()->paginate(10);
      return view('pizzarias.encomendas.index', compact('encomendas'));
    }

    public function showEncomenda(Request $request, $encomenda_id)
    {
      $encomenda = Encomenda::find($encomenda_id);
      return view("pizzarias.encomendas.show", compact("encomenda"));
    }
}
