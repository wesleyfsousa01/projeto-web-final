<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);

        return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'email' => 'email',
        ];

        $feedback = [
            'required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome dever no mínimo 3 carácteres',
            'nome.max' => 'O campo nome dever no máximo 40 carácteres',
            'email' => 'O campo email é obrigatório',
        ];

        $request->validate($regras, $feedback);

        $cliente = Cliente::create($request->all());

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Chegou no show() passando o ID: $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Chegou no edit() passando o ID: $id";
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
    public function destroy(string $id)
    {
        return "Chegou no destroy() passando o ID: $id";
    }
}
