@extends('site.layouts.basico')

@section('titulo','Home')
@section('conteudo')

    <div class="conteudo-destaque">

        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.<p>
                <div class="chamada">
                            <img src="{{ asset('/img/check.png') }}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3843.538674347568!2d-47.33038848836462!3d-15.562842317235525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9350a2f73fd3c36f%3A0xb8ffbb72c45a6bd6!2sIFG%20-%20C%C3%A2mpus%20Formosa!5e0!3m2!1spt-BR!2sbr!4v1725204702419!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
                    @component('site.layouts._components.form_contato',
                    ['classe' => 'borda-branca',
                     'motivo_contatos' => $motivo_contatos])

                    @endcomponent
            </div>
        </div>
    </div>
@endsection
