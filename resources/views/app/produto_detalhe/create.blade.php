@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 my-3">Adicionar detalhes do produto</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="{{ route('produto.show', ['produto' => $produto]) }}">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['unidades'=> $unidades, 'produto' => $produto])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
