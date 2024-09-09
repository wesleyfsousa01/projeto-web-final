@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Produto - Listar</p>
        </div>

        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('produto.create') }}">Novo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="#">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="table-responsive px-4">
                <table class="table table-bordered table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th colspan="3">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>
                                    <img src="{{ asset($produto->url) }} " alt="" width="100" height="100">
                                </td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>
                                    <a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Detalhes</a>
                                </td>
                                <td>
                                    <form id="form_{{ $produto->id }}" method="post"
                                        action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {{ $produtos->appends($request)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
