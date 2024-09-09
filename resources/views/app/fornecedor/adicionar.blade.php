@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p class="m-0 py-3">Fornecedor - Adicionar</p>
        </div>
        <div class="py-3 ps-5">
            <ul class="nav nav-pills">
                <li class="nav-item me-4">
                    <a class="nav-link bg-primary text-white" href="{{ route('app.fornecedor') }}">Voltar</a>
                </li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div class="w-50 m-auto">
                <form method="POST" action="{{ route('app.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="form-control mb-2" value="{{$fornecedor->nome ?? old('nome')}}">
                    {{$errors->has('nome') ? $errors->first('nome') : ''}}

                    <input type="text" class="form-control mb-2" name="site" class="borda-preta" placeholder="Site" value = "{{$fornecedor->site ?? old('site')}}">
                    {{$errors->has('site') ? $errors->first('site') : ''}}

                    <input type="text" class="form-control mb-2" name="uf" class="borda-preta" placeholder="UF" value="{{$fornecedor->uf ?? old('uf')}}">
                    {{$errors->has('uf') ? $errors->first('uf') : ''}}

                    <input type="text" class="form-control mb-2" name="email" class="borda-preta" placeholder="E-mail" value="{{$fornecedor->email ?? old('email')}}">
                    {{$errors->has('email') ? $errors->first('email') : ''}}

                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
