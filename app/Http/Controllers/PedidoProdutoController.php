<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos; //eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required|integer|min:1'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'quantidade.required' => 'O campo quantidade deve possuir um valor válido',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro',
            'quantidade.min' => 'A quantidade deve ser pelo menos 1',
        ];

        $request->validate($regras, $feedback);

        // Recupera o produto pelo ID
        $produto = Produto::find($request->get('produto_id'));

        if ($produto) {
            // Calcula o subtotal
            $quantidade = $request->get('quantidade');
            $subtotal = $produto->preco * $quantidade;

            // Adiciona o produto ao pedido com a quantidade e o subtotal
            $pedido->produtos()->attach(
                $produto->id,
                ['quantidade' => $quantidade, 'subtotal' => $subtotal]
            );

            // Atualiza o total do pedido somando o subtotal do novo item
            $total = $pedido->produtos()->sum('pedidos_produtos.subtotal');
            $pedido->total = $total;
            $pedido->save();
        }

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
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
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        //$pedido->produtos()->detach($produto->id);

        // Remove o item da tabela pivot
        $pedidoProduto->delete();

        // Recupera o pedido para recalcular o total
        $pedido = Pedido::find($pedido_id);

        if ($pedido) {
            // Recalcula o total do pedido somando todos os subtotais restantes
            $total = $pedido->produtos()->sum('pedidos_produtos.subtotal');
            $pedido->total = $total;
            $pedido->save();
        }

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
