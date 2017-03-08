@extends('layouts.pizzaria')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de Contro</div>
                <div class="panel-body">
                     @if($pizzaria!=null)
                      <h1>Seja bem vindo vindo {{$pizzaria->nome}}</h1>
                     <img class="img-responsive"
                          src="{{$pizzaria->imagem}}"
                          alt="{{$pizzaria->nome}}">
                       <p>Produtos : {{count($pizzaria->produtos)}}</p>
                       <p>Encomendas : {{count($pizzaria->encomendas)}}</p>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
