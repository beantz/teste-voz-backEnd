<?php

use App\Http\Controllers\pedidos_controller;
use App\Http\Controllers\totalPedido_controller;
use Illuminate\Support\Facades\Route;

/* middleware global vem primeiro e depois o especifico na rota */
Route::middleware('acesso.log:nome')->get('/pedidos', [pedidos_controller::class, 'pedidos'])->name('pedidos.index');
Route::post('/pedidos', [pedidos_controller::class, 'salvar'])->name('pedidos.salvar');
Route::get('/totalpedido', [totalPedido_controller::class, 'principal'])->name('pedido.total');
