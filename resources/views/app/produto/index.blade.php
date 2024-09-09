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
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Email</th>
                            <th>Peso</th>
                            {{-- <th>Unidade ID</th> --}}
                            {{-- <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th> --}}
                            <th colspan="3">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $produtos as $produto )
                            <tr>
                                <td>
                                    <img src="{{ asset($produto->url) }} " alt="" width="100" height="100">
                                </td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->fornecedor->email }}</td>
                                <td>{{ $produto->peso }}</td>
                                {{-- <td>{{ $produto->unidade_id }}</td>
                                <td>{{$produto->produtoDetalhe->comprimento ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->altura ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->largura ?? ''}}</td> --}}
                                <td>
                                    <a href="{{route('produto.show', ['produto'=> $produto->id])}}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$produto->id}}" method="post" action="{{route('produto.destroy', ['produto' => $produto->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('produto.edit', ['produto'=> $produto->id])}}">Editar</a>
                                </td>
                            </tr>

                            {{-- <tr>
                                <th colspan="12">
                                    <p>Pedidos</p>

                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Pedido:{{ $pedido->id }}</a>


                                    @endforeach
                                </th>
                            </tr> --}}
                        @endforeach
                    </tbody>

                </table>
                {{ $produtos->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
