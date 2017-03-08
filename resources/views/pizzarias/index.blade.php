@extends("layouts.master")
@section("content")
<br>
<div class="container">
  <div class="text-center">
    <h1>Pizzarias</h1>
  </div>
  <div class="text-right">
    <a class="btn btn-primary" href="">Criar</a>
  </div>
  <table class="table table-condensed">
      <thead>
       <tr>
         <th><b>Nome</b></th>
         <th><b>Contacto</b></th>
       </tr>
      </thead>
       @foreach($pizzarias as $key => $pizzaria)
         <tr>
           <td><a href="{{route('pizzarias.show', $pizzaria->id)}}">
             {{ucwords($pizzaria->nome)}}</a>
           </td>
           <td>{{$pizzaria->contacto}}</td>
         </tr>
       @endforeach
     </table>

     <div class="row">
       {!! $pizzarias->render() !!}
     </div>
   </div>
@endsection
