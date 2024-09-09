@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Visualizar</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('produto-detalhe.create', ['produto' => $produto]) }}">Adicionar Detalhes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-primary text-white" href="{{ route('produto.index') }}">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">

            <div class="table-responsive px-4">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>Imagem:</td>
                        <td>
                            <img src="{{ asset($produto->url) }} " alt="" width="100" height="100">
                        </td>
                    </tr>
                    <tr>
                        <td>ID:</td>
                        <td>{{$produto->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{$produto->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Unidade de Medida:</td>
                        <td>{{$produto->unidadeMedida->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{$produto->peso}}</td>
                    </tr>
                    <tr>
                        <td>Comprimento:</td>
                        <td>{{@$produto->ItemDetalhe->comprimento}}</td>
                    </tr>
                    <tr>
                        <td>Largura:</td>
                        <td>{{@$produto->ItemDetalhe->largura}}</td>
                    </tr>
                    <tr>
                        <td>Altura:</td>
                        <td>{{@$produto->ItemDetalhe->altura}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
