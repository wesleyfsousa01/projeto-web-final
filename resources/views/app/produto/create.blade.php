@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Produto - Adicionar</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="{{ route('produto.index') }}">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="container">
                @component('app.produto._components.form_create_edit', ['unidades' => $unidades, 'fornecedores' => $fornecedores])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
