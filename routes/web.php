<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('sistema.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pedido/{servico_id}', [App\Http\Controllers\controladorPedido::class, 'create'])->name('pedido');

Route::get('/servicos/novo', [App\Http\Controllers\controladorServico::class, 'create'])->name('novoServico');

Route::post('/pedido/enviar', [App\Http\Controllers\controladorPedido::class, 'store'])->name('gravaNovoPedido');

Route::get('/pedido/descricao', [App\Http\Controllers\controladorPedido::class, 'show'])->name('verPedido');

Route::post('/servico', [App\Http\Controllers\controladorServico::class, 'store'])->name('gravaNovoServico');

Route::get('/avaliacao', [App\Http\Controllers\HomeController::class, 'avaliacao'])->name('avaliaCliente');


Route::get('/sobre', function () {
    return view('sistema.sobre');
});

Route::get('/funcionalidades', function () {
    return view('sistema.suporte.funcionalidades');
});

Route::get('/funcionalidadesDash', function () {
    return view('sistema.suporte.funcionalidadesDash');
});

Route::get('/suporte', function () {
    return view('sistema.suporte.suporte');
});

Route::get('/suporteDash', function () {
    return view('sistema.suporte.suporteDash');
});

Route::get('/dashboardCliente', function () {
    return view('sistema.dashboardCliente');
});

Route::get('/dashboardPrestador', function () {
    return view('sistema.dashboardPrestador');
});

Route::get('/dashboardAdm', function () {
    return view('sistema.dashboardAdm');
});

Route::get('/ajuda', function () {
    return view('sistema.suporte.ajuda');
});

Route::get('/pedidos', function () {
    return view('sistema.pedido.pedido');
});

Route::get('/perfil', function () {
    return view('auth.profile');
});

Route::get('/descricaoPedido', function () {
    return view('sistema.pedido.descricaoPedido');
});

Route::get('/config', function () {
    return view('sistema.suporte.config');
});
