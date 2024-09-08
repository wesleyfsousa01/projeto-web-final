@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedidos - Listar</p>
        </div>
        <div class="menu">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('pedido.create')}}">Novo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table class="table table-striped table-bordered">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $pedidos as $pedido )
                            <tr>
                                <td>{{ $pedido->id }}</td>
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
