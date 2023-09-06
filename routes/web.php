<?php

use Illuminate\Support\Facades\Route;

// ROTAS QUE NÃO PASSAM PELO CONTROLLER

// Rota raiz
Route::get('/', function () {
    return view('sistema.index');
});

// Rotas sem autenticação

Route::get('/sobre', function () {
    return view('sistema.suporte.sobre');
});

Route::get('/funcionalidades', function () {
    return view('sistema.suporte.funcionalidades');
});

Route::get('/suporte', function () {
    return view('sistema.suporte.suporte');
});

// Rotas com autenticação

Auth::routes();

Route::get('/funcionalidadesDash', function () {
    return view('sistema.suporte.funcionalidadesDash');
});


Route::get('/suporteDash', function () {
    return view('sistema.suporte.suporteDash');
});

Route::get('/perfil', function () {
    return view('auth.profile');
});



// Rotas com autenticação - DASHBOARDS

Route::get('/dashboardCliente', function () {
    return view('sistema.dashboard.dashboardClient');
});
   
Route::get('/dashboardPrestador', function () {
    return view('sistema.dashboard.dashboardPrestador');
});

Route::get('/dashboardAdm', function () {
    return view('sistema.dashboard.dashboardAdm');
});


// Rotas com autenticação - PEDIDO

Route::get('/pedidos', function () {
    return view('sistema.pedido.pedido');
});

Route::get('/descricaoPedido', function () {
    return view('sistema.pedido.descricaoPedido');
});



// ROTAS QUE PASSAM PELO CONTROLLER

// HomeController

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/avaliacao', [App\Http\Controllers\HomeController::class, 'avaliacao'])->name('avaliaCliente');

// Controller do Pedido

Route::get('/pedido/lista', [App\Http\Controllers\controladorPedido::class, 'listaPedidos'])->name('listagemPedidos');

Route::get('/pedido/{servico_id}', [App\Http\Controllers\controladorPedido::class, 'create'])->name('pedido');

Route::post('/pedido/enviar', [App\Http\Controllers\controladorPedido::class, 'store'])->name('gravaNovoPedido');

Route::get('/pedido/descricao', [App\Http\Controllers\controladorPedido::class, 'show'])->name('verPedido');

// Controller do Serviço

Route::get('/servicos/novo', [App\Http\Controllers\controladorServico::class, 'create'])->name('novoServico');

Route::post('/servico', [App\Http\Controllers\controladorServico::class, 'store'])->name('gravaNovoServico');








