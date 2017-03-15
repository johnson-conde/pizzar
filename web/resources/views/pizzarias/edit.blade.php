@extends("layouts.pizzaria")
@section("content")
   <div class="">
     <form class=""
           action="{{route('pizzarias.edit.post', $pizzaria->Pizzaria_ID)}}"
           method="post">
       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <div class="form-group">
         <label for="nome">Nome</label>
         <input type="text" name="nome" value="{{$pizzaria->Nome}}">
       </div>
       <div class="form-group">
         <label for="contacto">Contacto:</label>
         <input type="text" name="contacto" value="{{$pizzaria->Contacto}}">
       </div>
       <div class="form-group">
         <label for="email">Email:</label>
         <input type="text" name="email" value="{{$pizzaria->Email}}">
       </div>
       <div class="form-group">
         <label for="endereco">Endereço:</label>
         <input type="text"
                name="endereco"
                value="{{$pizzaria->Endereco}}">
       </div>
       <div class="form-group">
         <label for="imagem">Imagem</label>
         <input type="file" name="imagem" value="">
       </div>
       <div class="form-group">
         <label for="username">Nome do Usuário:</label>
         <input type="text" name="username" value="{{$pizzaria->Username}}">
       </div>
       <div class="form-group">
         <label for="password">Senha:</label>
         <input type="password" name="password" value="">
       </div>
       <div class="form-group">
       <label for="descricao">Descrição:</label>
        <textarea name="descricao"
                  rows="8"
                  cols="40"
                  value="{{$pizzaria->Descricao}}"></textarea>
       </div>
       <input type="submit" value="Criar">
     </form>
   </div>
@endsection
