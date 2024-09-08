@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">

            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <h4>Detalhes do Pedido:</h4>
                <table border="1" width="100%">
                    <thead>
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

            <div style="width: 80%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido:</h4>

                <table border="1" width="100%">
                    <thead>
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

                {{-- @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent --}}
            </div>
            {{-- {{dd($pedido)}} --}}
            {{-- Teste --}}
            <div style="width: 100%; margin-top: 50px; margin-left: auto; margin-right: auto;">
                <div style="width: 80%;  margin-left: auto; margin-right: auto;">
                    <div style="width: 50%; margin-bottom: 50px;  margin-left: auto; margin-right: auto;">
                        <form action="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                            <label for="">Pesquisar produto:</label>
                            <input type="text" placeholder="Informe o nome do produto" name="nome">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                    <div>
                        @if ($produtos->count())
                            <table border="1" width="100%">
                                <thead>
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
                                                        placeholder="Qtd" class="borda-preta" style="max-width: 150px;">
                                                    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
                                                </td>

                                                <td>
                                                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">

                                                    <button type="submit">Adicionar</button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{ $produtos->appends($request->all())->links() }}
                        @else
                            <h1 style="color:black;">Nenhum registro encontrado</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
