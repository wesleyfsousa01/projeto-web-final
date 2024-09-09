<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            word-wrap: break-word;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #393838;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #9b9999;
            font-weight: bold;
        }

        .table-bordered {
            border: 2px solid #ddd;
        }

        .container-img {}

        .logo {
            width: auto;
            height: auto;
        }
    </style>
</head>

<body>
    {{-- {{$pedido->produtos}} --}}
    <div class="container-img">
        <img class="logo" src="{{ public_path('img/logo.png') }}" alt="">
        <h1>Super Gestão</h1>
    </div>
    <hr>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Detalhes do Pedido:</h1>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>N° Pedido</th>
                        <th>Cliente</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->cliente->nome }}</td>
                        <td>{{ $pedido->created_at->format('d/m/y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <div>
                <h1>Itens do Pedido:</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Qtd.</th>
                        <th>Val. Unt</th>
                        <th>Produto</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>{{ $produto->preco }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total:</td>
                        <td colspan="3">R${{ ' ' . $pedido->total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
