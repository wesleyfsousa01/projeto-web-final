@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('produto.create')}}">Novo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Fornecedor</th>
                                <th>Email</th>
                                <th>Peso</th>
                                <th>Unidade ID</th>
                                <th>Comprimento</th>
                                <th>Altura</th>
                                <th>Largura</th>
                                <th colspan="3">Ações</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->fornecedor->nome }}</td>
                                    <td>{{ $produto->fornecedor->email }}</td>
                                    <td>{{ $produto->peso }}</td>
                                    <td>{{ $produto->unidade_id }}</td>
                                    <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                    <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('produto.show', ['produto'=> $produto->id]) }}" class="text-primary">Visualizar</a>
                                    </td>
                                    <td>
                                        <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="#" class="text-danger" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('produto.edit', ['produto'=> $produto->id]) }}" class="text-warning">Editar</a>
                                    </td>
                                </tr>
                    
                                <tr>
                                    <th colspan="12" class="bg-light">
                                        <p class="text-primary">Pedidos</p>
                                        @foreach ($produto->pedidos as $pedido)
                                            <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}" class="text-secondary">Pedido:{{ $pedido->id }}</a>
                                        @endforeach
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                <div class="mt-3">
                    {{ $produtos->appends($request)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
