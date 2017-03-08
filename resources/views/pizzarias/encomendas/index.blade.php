@extends("layouts.pizzaria")
@section("content")
   <div class="">
     <h1 class="text-center">Encomendas</h1>
     <table class="table table-condensed">
       <tr>
         <th>Número</th>
         <th>Usuario</th>
         <th>Subtotal</th>
         <th>Total</th>
         <th>Data</th>
       </tr>
       @foreach($encomendas as $key => $encomenda)
         <tr>
           <td>
             <a href="{{route('encomendas.show', $encomenda->id )}}">
               {{$encomenda->id}}
             </a>
           </td>
           <td>{{$encomenda->usuario->fullname}}
           </td>
           <td>{{$encomenda->subtotal}}</td>
           <td>{{$encomenda->total}}</td>
           <td>{{$encomenda->created_at->diffForHumans()}}</td>
         </tr>
       @endforeach
     </table>

     <div class="row">
        {!! $encomendas->render() !!}
     </div>
   </div>
@endsection
