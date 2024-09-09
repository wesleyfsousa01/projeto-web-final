@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Cliente - Adicionar</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('cliente.index') }}">Voltar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="#">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.cliente._components.form_create_edit')

                @endcomponent
            </div>
        </div>
    </div>
@endsection
