<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato (Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view("site.contato", ['titulo'=> 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        //Realizar a validação dos dados recebidos via formulário
        $request->validate([
            'nome'=> 'required | min:3 | max:40 | unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ],
        [
	        'required'=> 'O campo :attribute é obrigatório!',
            'nome.min'=> 'O campo nome deve conter no mínimo 3 carácteres.',
            'nome.max'=> 'O campo nome deve conter no máxmimo 40 carácteres.',
            'nome.unique'=> 'O nome inserido já está em uso.',
            'email.email'=> 'O campo email é obrigatório.',
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
