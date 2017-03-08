@extends("layouts.pizzaria")
@section("content")
<br>
<div class="container">
  <div class="text-center">
    <h1>{{ucfirst($pizzaria->nome)}}</h1>
  </div>
  <br>
  <div class="well">
    <p><b>Nome: </b>{{ucfirst($pizzaria->nome)}}</p>
    <p><b>Endereço: </b>{{ucfirst($pizzaria->endereco)}}</p>
    <p><b>Email: </b>{{ucfirst($pizzaria->email)}}</p>
    <p><b>Contacto: </b>{{ucfirst($pizzaria->contacto)}}</p>
  </div>

  <h3>Produtos</h3>
  <div class="text-right">
    <a class="btn btn-primary" href="{{route('produtos.create.get', $pizzaria->id)}}">Criar</a>
  </div>
  @include('pizzarias.produtos.list_produtos', ['produtos'=> $pizzaria->produtos])
@endsection
