@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente - Listar</p>
        </div>
        <div class="menu">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('cliente.create')}}">Novo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Consulta</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <table class="table table-striped table-bordered">
                        <table class="table table-hover">
                            <thead class="bg-primary text-white">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $clientes as $cliente )
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>
                                    <a href="{{route('cliente.show', ['cliente'=> $cliente->id])}}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{$cliente->id}}" method="post" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('cliente.edit', ['cliente'=> $cliente->id])}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $clientes->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
