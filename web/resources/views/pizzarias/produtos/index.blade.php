@extends("layouts.pizzaria")
@section("content")
<div class="row">
  <div class="col-md-8">
    <ul class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="tables-dynamic-table.html#">Home</a></li>
      <li><a href="tables-dynamic-table.html#">Tables</a></li>
      <li class="active">Dynamic Table</li>
    </ul>
  </div>
  <div class="col-md-4">
    <div class="text-right">
        <a class="btn btn-primary" href="{{route('produtos.create.get')}}">Criar</a>
    </div>
  </div>
</div>
<div class="main-header">
  <h2>Todos os Produtos</h2>
  <em>produtos da pizzaria</em>
</div>

      @if($produtos)
        <div class="widget widget-table">
          <!-- <div class="widget-header"> -->
            <!-- <h3><i class="fa fa-table"></i> Drap/Drop and Show/Hide Column</h3>
            <em> -
                 <a href="http://datatables.net/" target="_blank">jQuery Data Table</a>
                 enable to show/hide and drap-drop column
            </em> -->
          <!-- </div> -->
          <div class="widget-content">
            <!-- <div class="alert alert-info fade in">
      				<button class="close" data-dismiss="alert">&times;</button>
      				<i class="fa fa-info-circle"></i> Try to show/hide column visibility and drag the column to another position to reorder table columns.
      			</div> -->
            <table id="featured-datatable" class="table table-sorting table-striped table-hover datatable">
            <!-- <table id="datatable-column-interactive" class="table table-sorting table-hover table-bordered datatable"> -->
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                  <th>Categoria</th>
                  <th>Data de Criacao</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($produtos as $key => $produto)
                    <tr>
                        <td><a href="{{route('produtos.show', $produto->id)}}">
                                {{$produto->nome}}</a>
                        </td>
                        <td>{{$produto->preco}}</td>
                        <td>{{$produto->quantidade}}</td>
                        <td>{{$produto->categoria->nome}}</td>
                        <td>{{$produto->created_at->diffForHumans()}}</td>
                        <td>
                            <a class="btn btn-primary"
                               href="{{route('produtos.edit.get', $produto->id)}}">Modificar</a>
                            <a class="btn btn-danger" href="{{route('produtos.delete', $produto->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @else
        <div class="text-center">
            <h1>Nenhum produto encontrado</h1>
        </div>
      @endif
@endsection
