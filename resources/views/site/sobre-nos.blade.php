@extends('site.layouts.basico')

@section('titulo', 'Sobre-Nós')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina text-center">
            <br>
            <h1>Olá, eu sou o Super Gestão</h1>
        </div>

        <div class="informacao-pagina text-center">
        <br><br>
            <p>O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os negócios da sua empresa.</p>
            <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante: seus negócios!</p>
        </div>
        <br><br><br><br>
                <h2>Nossos Valores:</h2>
                <ul class="list-unstyled">
                    <br><br>
                    <li><strong>Inovação:</strong> Estamos sempre buscando novas maneiras de aprimorar nossos produtos e serviços.</li>
                    <br>
                    <li><strong>Compromisso:</strong> Nosso compromisso é com a excelência e satisfação de nossos clientes.</li>
                    <br>
                    <li><strong>Transparência:</strong> Operamos com integridade e clareza em todas as nossas ações.</li>
                </ul>
            </div>
        </div>

    </div>

    @include('app.layouts._partials.footer')
@endsection

