@extends("layouts.pizzaria")
@section("content")
   <br>
   <div class="container well col-md-8 col-md-offset-2">
     <h1>Informações sobre o Produto</h1>
     <form class="form"
           action="{{route('produtos.create.post')}}"
           method="post"
           enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="pizzaria_id" value="{{$pizzaria->id}}">
          <div class="form-group {{$errors->has('nome') ? 'has-error' : ''}}">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" value="">
            @include("pizzarias.produtos._error", ["error" => $errors->has('nome'),
                                      "error_message" =>  $errors->first('nome')])
          </div>

          <div class="form-group {{$errors->has('imagem') ? 'has-error' : ''}}">
              <label for="imagem">Imagem do Produto:</label>
              <input type="file" name="imagem" value="">
              @include("pizzarias.produtos._error", ["error" => $errors->has('imagem'),
                                      "error_message" =>  $errors->first('imagem')])
          </div>

        <div class="form-group {{$errors->has('preco') ? 'has-error' : ''}}">
          <label for="preco">Preço do produto:</label>
          <input class="form-control" type="text" name="preco" value="">
         @include("pizzarias.produtos._error", ["error" => $errors->has('preco'),
                                      "error_message" =>  $errors->first('preco')])
       </div>

       <div class="form-group {{$errors->has('quantidade') ? 'has-error' : ''}}">
          <label for="quantidade">Quantidade:</label>
          <input class="form-control"type="text" name="quantidade" value="">
         @include("pizzarias.produtos._error", ["error" => $errors->has('quantidade'),
                                      "error_message" =>  $errors->first('quantidade')])
       </div>

       <div class="form-group">
          <label for="created_at">Categoria:</label>
          <select class="form-control" name="categoria_id">
           @foreach($categorias as $key=>$category)
             <option value="{{$key}}">{{$category}}</option>
           @endforeach
         </select>
       </div>
       <div class="form-group {{$errors->has('descricao') ? 'has-error' : ''}}">
           <label for="descricao">Descrição do Produto:</label>
           <textarea class="form-control" name="descricao" rows="5" cols="60"></textarea>
        @include("pizzarias.produtos._error", ["error" => $errors->has('descricao'),
                                     "error_message" =>  $errors->first('descricao')])
       </div>
       <input class="btn btn-primary" type="submit" value="Cadastrar Produto">
       <input  class="btn btn-danger" type="reset" value="Limpar">
     </form>
   </div>
@endsection
