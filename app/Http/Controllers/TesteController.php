<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2) {
        $soma = $p1 + $p2;
        //echo "A soma de $p1 + $p2 é = $soma";

        //passagem de paramêtro de para view, via array associativo:
        //view('diretorio.view',['p1'=> $p1, 'p2' => $p2])
        return view('site.teste', compact('p1', 'p3'));
    }
}
