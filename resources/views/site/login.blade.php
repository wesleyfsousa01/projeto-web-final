@extends('site.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <input name="usuario" value="{{old('usuario')}}" type="text" placeholder="Usuário" class="borda-preta">
                    {{$errors->has('usuario') ? $errors->first('usuario'): ''}}
                    <input name="senha" value="{{old('senha')}}" type="password" placeholder="Senha" class="borda-preta">
                    {{$errors->has('senha') ? $errors->first('senha'): ''}}
                    <button type="submit" class="">Acessar</button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.538674347568!2d-47.33038848836462!3d-15.562842317235525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9350a2f73fd3c36f%3A0xb8ffbb72c45a6bd6!2sIFG%20-%20C%C3%A2mpus%20Formosa!5e0!3m2!1spt-BR!2sbr!4v1725204898209!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
