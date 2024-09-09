@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div>
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Adicionar Produtos ao Pedido</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('pedido.index') }}">Voltar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="#">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">

            <div class="table-responsive px-4">
                <h4>Detalhes do Pedido:</h4>
                <table class="table table-bordered table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID do pedido</th>
                            <th>ID do cliente</th>
                            <th>Nome do Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td>{{ $pedido->cliente->nome }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive px-4 mt-2">
                <h4>Itens do pedido:</h4>

                <table class="table table-bordered table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>Qtd</th>
                            <th>Val. Unt</th>
                            <th>Produto</th>
                            <th>Data</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->pivot->quantidade }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                <td>{{ $produto->pivot->subtotal }}</td>
                                <td>
                                    <form id="form_{{ $produto->pivot->id }}"
                                        action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">
                                            Exlcuir
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total:</th>
                            <th colspan="6">R${{ ' ' . $pedido->total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <hr>
            <div>
                <div class="container px-5 mb-5">
                    <form action="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                        <div class="mt-5">
                            <label for="" class="form-label">Pesquisar produto:</label>
                            <input type="text" placeholder="Informe o nome do produto" name="nome"
                                class="form-control mb-2">
                            <button type="submit" class="btn btn-success">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive px-4 mt-2">
                    @if ($produtos->count())
                        <table class="table table-bordered table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Estoque</th>
                                    <th>Informe a quantidade</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($produto->url) }} " alt="" width="100"
                                                height="100">
                                        </td>
                                        <td>{{ $produto->nome }}</td>
                                        <td>{{ $produto->descricao }}</td>
                                        <td>{{ $produto->peso }}</td>

                                        <form action="" method="POST"
                                            {{ route('pedido-produto.store', ['pedido' => $pedido]) }}>
                                            @csrf

                                            <td style="width: 10%;">
                                                <input type="number" name="quantidade"
                                                    value="{{ old('quantidade') ? old('quantidade') : '' }}"
                                                    placeholder="Qtd" class="form-control" style="max-width: 150px;">
                                                {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
                                            </td>

                                            <td>
                                                <input type="hidden" name="produto_id" value="{{ $produto->id }}">

                                                <button type="submit" class="btn btn-success">
                                                    Adicionar
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $produtos->appends($request->all())->links('pagination::bootstrap-4') }}
                    @else
                        <h1 style="color:black;">Nenhum registro encontrado</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
