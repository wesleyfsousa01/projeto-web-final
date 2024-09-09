@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Fornecedor - Pesquisar</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('app.fornecedor.adicionar') }}">Novo</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="w-50 m-auto">
                <form method="POST" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <div>
                        <!-- Campo Nome -->
                        <div class="mb-2">
                            <input type="text" name="nome" class="form-control" placeholder="Nome">
                        </div>

                        <!-- Campo Site -->
                        <div class="mb-2">
                            <input type="text" name="site" class="form-control" placeholder="Site">
                        </div>

                        <!-- Campo UF -->
                        <div class="mb-2">
                            <input type="text" name="uf" class="form-control" placeholder="UF">
                        </div>

                        <!-- Campo E-mail -->
                        <div class="mb-2">
                            <input type="text" name="email" class="form-control" placeholder="E-mail">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">
                            Pesquisar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
