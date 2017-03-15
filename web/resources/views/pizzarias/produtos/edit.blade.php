@extends("layouts.pizzaria")
@section('styles')
<style>
 .highlighted{
   border: 1px solid #f00;
 }
</style>
@endsection

@section("content")
<div class="content">
  <div class="row">
    <ul class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="tables-dynamic-table.html#">Home</a></li>
      <li><a href="tables-dynamic-table.html#">Tables</a></li>
      <li class="active">Dynamic Table</li>
    </ul>
  </div>
  <div class="main-header">
    <h2>Dynamic Table</h2>
    <em>tables with lot of features and interactivity</em>
  </div>
   <div class="main-content">
     <div class="row">
       <div class="col-md-86">
         <div class="widget">
    				<div class="widget-header">
    					<h3><i class="fa fa-edit"></i>Adicional um Produto</h3>
    				</div>
    				<div class="widget-content">
                <form role="form"
                       action="{{route('produtos.edit.post', $produto->id)}}"
                       method="post"
                       enctype="multipart/form-data">
                       <div class="row">
                         <div class="col-md-8">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="form-group {{$errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" value="{{$produto->nome}}">
                            @include("admin.pizzarias.produtos._error", ["error" => $errors->has('nome'),
                                                      "error_message" =>  $errors->first('nome')])
                          </div>

                        <div class="form-group {{$errors->has('preco') ? 'has-error' : ''}}">
                          <label for="preco">Preço do produto:</label>
                          <input class="form-control" type="text" name="preco" value="{{$produto->preco}}">
                         @include("admin.pizzarias.produtos._error", ["error" => $errors->has('preco'),
                                                      "error_message" =>  $errors->first('preco')])
                       </div>

                       <div class="form-group {{$errors->has('quantidade') ? 'has-error' : ''}}">
                          <label for="quantidade">Quantidade:</label>
                          <input class="form-control"type="text" name="quantidade" value="{{$produto->quantidade}}">
                         @include("admin.pizzarias.produtos._error", ["error" => $errors->has('quantidade'),
                                                      "error_message" =>  $errors->first('quantidade')])
                       </div>

                       <div class="form-group">
                          <label for="created_at">Categoria:</label>
                          <select class="form-control" name="categoria_id" value="{{$produto->categoria_id}}">
                           @foreach($categorias as $key=>$category)
                             <option value="{{$key}}">{{$category}}</option>
                           @endforeach
                         </select>
                       </div>
                       <div class="form-group {{$errors->has('descricao') ? 'has-error' : ''}}">
                           <label for="descricao">Descrição do Produto:</label>
                           <textarea  class="form-control"
                                      name="descricao"
                                      rows="5">{{$produto->descricao}}</textarea>
                           @include("admin.pizzarias.produtos._error", ["error" => $errors->has('descricao'),
                                                      "error_message" =>  $errors->first('descricao')])
                       </div>
                       <input class="btn btn-primary" type="submit" value="Editar Produto">
                       <input  class="btn btn-danger" type="reset" value="Limpar">
                     </div>
                     <div class="col-md-4">
                       @if($produto->imagem)
                          <img id="img" class="img-responsive thumbnail" src="{{$produto->imagem}}" alt="">
                       @else
                          <p id="img">Adicionar imagem</p>
                       @endif
                     </div>
                   </div>
                </form>
            </div>
          </div>
        </div>
     </div>
   </div>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form class="form"
              action="{{route('produtos.edit.imagem', $produto->id)}}"
              method="post"
              enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar imagem do produto</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group {{$errors->has('imagem') ? 'has-error' : ''}}">
              <label for="imagem">Imagem do Produto:</label>
              <input type="file" name="imagem" value="">
              @include("admin.pizzarias.produtos._error", ["error" => $errors->has('imagem'),
                                      "error_message" =>  $errors->first('imagem')])
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default" value="Submit">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   $("#img").hover(function(){
      $("#img").addClass('highlighted');
   },function(){
     $("#img").removeClass('highlighted');
   });

   $("#img").click(function(){
      $('#myModal').modal('show');
   });

</script>
@endsection
