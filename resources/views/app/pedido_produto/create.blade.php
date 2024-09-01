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
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>ID do Cliente: {{ $pedido->cliente_id }}</p>
            <p>Nome: {{ $pedido->cliente->nome }}</p>

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
                                <td>{{$produto->pivot->subtotal}}</td>
                                <td>
                                    <form id="form_{{ $produto->pivot->id }}"
                                        action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <a  href="#"
                                            onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()"
                                            >
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
                            <th colspan="6">R${{' ' .$pedido->total}}</th>
                        </tr>
                    </tfoot>
                </table>

                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
