<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id',
            'preco' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'arquivo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve conter no mínimo 3 carácteres',
            'nome.max' => 'O campo nome deve conter no máximo 40 carácteres',
            'descricao.min' => 'O campo descrição deve conter no mínimo 3 carácteres',
            'nome.max' => 'O campo descrição deve conter no máximo 2000 carácteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'preco.min' => 'O campo preço não pode ser negativo.',
            'preco.regex' => 'O campo preço deve ter no máximo duas casas decimais.',
            'arquivo.required' => 'O envio de uma imagem é obrigatório.',
            'arquivo.image' => 'O arquivo deve ser uma imagem válida.',
            'arquivo.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'arquivo.max' => 'A imagem não pode exceder o tamanho de 2MB.',
            'arquivo.dimensions' => 'A imagem deve ter dimensões mínimas de 100x100 e máximas de 2000x2000 pixels.',
        ];

        $request->validate($regras, $feedback);

        $item = Item::create([
           'nome' => $request->nome,
           'descricao' => $request->descricao,
           'preco' => $request->preco,
           'peso' => $request->peso,
           'fornecedor_id' => $request->fornecedor_id,
           'unidade_id' => $request->unidade_id,
        ]);

        $item->storeArquivo($request->file('arquivo'));

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id',
            'preco' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'arquivo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve conter no mínimo 3 carácteres',
            'nome.max' => 'O campo nome deve conter no máximo 40 carácteres',
            'descricao.min' => 'O campo descrição deve conter no mínimo 3 carácteres',
            'nome.max' => 'O campo descrição deve conter no máximo 2000 carácteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'preco.min' => 'O campo preço não pode ser negativo.',
            'preco.regex' => 'O campo preço deve ter no máximo duas casas decimais.',
            'arquivo.required' => 'O envio de uma imagem é obrigatório.',
            'arquivo.image' => 'O arquivo deve ser uma imagem válida.',
            'arquivo.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'arquivo.max' => 'A imagem não pode exceder o tamanho de 2MB.',
            'arquivo.dimensions' => 'A imagem deve ter dimensões mínimas de 100x100 e máximas de 2000x2000 pixels.',
        ];

        $request->validate($regras, $feedback);

        //dd($produto);
        $produto->update($request->all());

        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
