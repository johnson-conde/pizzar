@extends("layouts.pizzaria")
@section("content")
 <div class="container">
   <div class="">
   <p class="text-left"><b>Encomendado por:</b> {{$encomenda->usuario->fullname}}</p>
   <p class="text-right"><b>Estado:</b> {{$encomenda->estado}}</p>
   </div>
   <!-- <p>{{$encomenda->pizzaria->nome}}</p> -->
   <h3>Items</h3>
   <table class="table table-striped">
     <tr>
       <th>Produto</th>
       <th>Quantidade</th>
       <th>Subtotal</th>
    </tr>
     @foreach($encomenda->itemsDaEncomenda as $item)
       <tr>
         <td>{{$item->produto->nome}}</td>
         <td>{{$item->quantidade}}</td>
         <td>{{$item->subtotal}}</td>
      </tr>
     @endforeach
   </table>

   <div class="text-right">
     <p><b>Subtotal:</b> {{$encomenda->subtotal}}</p>
     <p><b>Total:</b> {{$encomenda->total}}</p>
   </div>
   <a class="btn btn-success" href="{{URL::previous()}}">Voltar</a>
 </div>
@endsection
