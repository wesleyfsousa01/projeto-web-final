<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';
        if($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe';
        }
        if($request->get('erro') == 2) {
            $erro = 'É necessário realizar login para ter acesso a página';
        }

        return view('site.login' , ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(LoginRequest $request) {
        $request->validated();

        $email = $request->safe()->only('email');
        $password = $request->safe()->only('senha');

        $user = new User();
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if(isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
