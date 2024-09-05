@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Editar</p>
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
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores])

                @endcomponent
            </div>
        </div>
    </div>
@endsection
