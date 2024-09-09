@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div>

        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Fornecedor - Listar</p>
        </div>

        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('app.fornecedor.adicionar') }}">Novo</a>
                </li>

                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('app.fornecedor') }}">Pesquisar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="table-responsive px-5">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Site</th>
                            <th scope="col">UF</th>
                            <th scope="col">E-mail</th>
                            <th scope="col" class="text-center">Editar</th>
                            <th scope="col" class="text-center">Excluir</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de produtos:</p>
                                    <table class="table table-bordered w-75">
                                        <thead class="bg-success">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedor->produtos as $key => $produto)
                                                <tr>
                                                    <td>{{ $produto->id }}</td>
                                                    <td>{{ $produto->nome }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            <tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $fornecedores->appends($request)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>

@endsection
