@extends('app.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
    <br><br><br><br><br><br>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/carro1.png') }}" class="d-block w-100" alt="Imagem 1">
            <div class="carousel-caption d-none d-md-block">
              <h5 >Bem-vindo à Super Gestão</h5>
              <p>Oferecemos os melhores serviços.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/carro2.png') }}" class="d-block w-100" alt="Imagem 2">
            <div class="carousel-caption d-none d-md-block">
              <h5>Nossos Produtos</h5>
              <p>Alta qualidade garantida.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img/carro3.png') }}" class="d-block w-100" alt="Imagem 3">
            <div class="carousel-caption d-none d-md-block">
              <h5>Fale Conosco</h5>
              <p>Estamos prontos para atender você.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </button>
      </div>
@endsection