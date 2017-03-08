@extends("layouts.pizzaria")
@section("content")
    <br>
    <div class="container">
        <h1>Produtos</h1>
        <form class="form"
              action="{{route('produtos.index')}}"
              method="get"
              enctype="multipart/form-data">
            <div class="col-md-4">
                <label for="query">Procurar</label>
                <input type="text" name="query" value="" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="query">Procurar</label>
                <select name="" class="form-control">
                    <option value="nome">Nome</option>
                    <option value="preco">Preço</option>
                    <option value="categoria">Categoria</option>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn  btn-primary" type="button" name="button">Procurar</button>
            </div>
        </form>
        <div class="text-right">
            <a class="btn btn-primary" href="{{route('produtos.create.get')}}">Criar</a>
        </div>
        @if($produtos)
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th><b>Nome</b></th>
                    <th><b>Preço</b></th>
                    <th><b>Quantidade</b></th>
                    <th><b>Categoria</b></th>
                    <th><b>Data de Criacao</b></th>
                    <th><b>Ações</b></th>
                </tr>
                </thead>
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
                            <a class="btn btn-primary" href="{{route('produtos.edit.get', $produto->id)}}">Modificar</a>
                            <a class="btn btn-danger" href="{{route('produtos.delete', $produto->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="text-center">
                <h1>Nenhum produto encontrado</h1>
            </div>
        @endif


        <div class="row">
            {!! $produtos->render() !!}
        </div>
    </div>
@endsection
