<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Item;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::with('cliente')->paginate(10);
        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();

        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'cliente_id' => 'exists:clientes,id'
        ];

        $feedback = [
            'cliente_id.exists' => 'O cliente informado não existe',
        ];

        $request->validate($regras, $feedback);

        $pedido = Pedido::create([
            'cliente_id' => $request->cliente_id,
            'total' => 0,
        ]);

        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->produtos()->detach();
        $pedido->delete();
        return redirect()->route('pedido.index');
    }

    public function relatorio(){
        return view('pedido.relatorio');
    }
}
