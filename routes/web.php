<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

//As rotas são definidas com dois paramêtros essenciais:
/*
    O primeiro Argumento é a URI (rota)
    O segundo é a função de callback
*/

Route::get('home-padrao', function() {
    return view('home');
});

Route::get('/', [PrincipalController::class, 'principal'])
    ->name('site.index')
    ->middleware('log.acesso');

Route::get('/sobre', [SobreNosController::class, 'sobreNos'])->
    name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])
    ->name('site.contato')
    ->middleware('log.acesso');

Route::post('/contato', [ContatoController::class, 'salvar'])->
    name('site.contato');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');


// Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
// Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('auth')->prefix('/app')->group(function(){

    Route::get('/home', [HomeController::class, 'index'])
        ->name('app.home');

    //logout
    // Route::get('/sair', [LoginController::class, 'sair'])
    //     ->name('app.sair');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    //fornecedor
    Route::get('/fornecedor', [FornecedorController::class, 'index'])
        ->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])
        ->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])
        ->name('app.fornecedor.editar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])
        ->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])
        ->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])
        ->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])
        ->name('app.fornecedor.excluir');

    //produto
    Route::resource('produto', ProdutoController::class);
    //produto-detalhes
    Route::get('produto-detalhe/create/{produto}', [ProdutoDetalheController::class, 'create'])->name('produto-detalhe.create');
    Route::post('produto-detalhe/store', [ProdutoDetalheController::class, 'store'])->name('produto-detalhe.store');
    // Route::resource('produto-detalhe',ProdutoDetalheController::class);
    //cliente
    Route::resource('cliente', ClienteController::class);
    //pedido
    Route::resource('pedido', PedidoController::class);
    Route::get('pedido/relatorio', [PedidoController::class,'relatorio']);
    //pedido-produto
    //Route::resource('pedido-produto', PedidoProdutoController::class);
    Route::get('pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::delete('pedido-produto/destroy/{pedidoProduto}/{pedido_id}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class,'teste'])->name('teste');

//Rota de fallback
Route::fallback(function() {
    return 'A rota acessada não existe.
    <a href="'.route('site.index').'"><Strong>Pagina principal</Strong></a>
    Clique aqui para ir para a página inicial';
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
