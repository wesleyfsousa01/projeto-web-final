@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
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
                <form method="POST" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <div class="row g-3">
                        <!-- Campo Nome -->
                        <div class="col-md-3">
                            <input type="text" name="nome" class="form-control" placeholder="Nome">
                        </div>
                        
                        <!-- Campo Site -->
                        <div class="col-md-3">
                            <input type="text" name="site" class="form-control" placeholder="Site">
                        </div>
                        
                        <!-- Campo UF -->
                        <div class="col-md-2">
                            <input type="text" name="uf" class="form-control" placeholder="UF">
                        </div>
                        
                        <!-- Campo E-mail -->
                        <div class="col-md-4">
                            <input type="text" name="email" class="form-control" placeholder="E-mail">
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary w-100">Pesquisar</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection
