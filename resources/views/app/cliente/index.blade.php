@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Cliente - Listar</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('cliente.create') }}">Novo</a>
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
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a>
                                </td>
                                <td>
                                    <form id="form_{{ $cliente->id }}" method="post"
                                        action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a>
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
