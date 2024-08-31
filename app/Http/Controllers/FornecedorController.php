<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(5);


        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {
        $msg = '';

        //Inclusão
        if($request->input('_token') != '' && $request->input('id') == ''){
            //validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            //Mensagens personalizadas
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 carácteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 carácteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 carácteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 carácteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras,$feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //Enviando msg de sucesso
            $msg = 'Fornecedor Cadastrado com Sucesso!';
        }

        //Edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $pudate = $fornecedor->update($request->all());

            if($pudate) {
                $msg = "Update realizado com sucesso!";
            }
            else {
                $msg = "Update não pode ser concluido!";
            }

            return redirect()->route('app.fornecedor.editar', ['id'=> $request->input('id'),'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['id' => $request->input('id') , 'msg' => $msg]);
    }

    public function editar($id , $msg = '') {

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
