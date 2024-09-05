
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/estilo_global.css') }}">
    @vite('resources/sass/app.scss','resources/js/app.js',)
<body>
    @include('app.layouts._partials.topo')
    @yield('conteudo')
</body>
</html>

