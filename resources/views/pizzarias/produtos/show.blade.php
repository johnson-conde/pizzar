@extends("layouts.pizzaria")
@section("content")
 <div class="container">
   <div class="jumbotron">
     <img class="img-responsive" src="{{$produto->imagem}}" alt="">
   </div>
   <p><b>Nome:</b> {{$produto->nome}}</p>
   <p><b>Categoria:</b> {{$produto->categoria->nome}}</p>
   <p><b>Quantidade em stock:</b> {{$produto->quantidade}}</p>
   <p><b>Preço por unidade:</b> {{$produto->preco}} Akz</p>

   <a class="btn btn-success" href="{{URL::previous()}}">Voltar</a>
 </div>
@endsection
