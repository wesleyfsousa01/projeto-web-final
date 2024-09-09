<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function relatorio(Pedido $pedido) {

        $pedido = Pedido::with('cliente')->find($pedido->id);

        $pdf = Pdf::loadView('app.pedido.relatorio', ['pedido' => $pedido]);
        return $pdf->stream();
    }
}
