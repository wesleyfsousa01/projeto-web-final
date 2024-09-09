@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Pedidos - Listar</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('pedido.create') }}">Novo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="#">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="table-responsive px-4">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th>ID Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $pedidos as $pedido )
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente->nome }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <th><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produtos</a></th>
                                <td>
                                    <a href="{{route('pedido.show', ['pedido'=> $pedido->id])}}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$pedido->id}}" method="post" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('pedido.edit', ['pedido'=> $pedido->id])}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $pedidos->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
