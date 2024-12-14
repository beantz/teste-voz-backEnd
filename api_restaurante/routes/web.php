<?php

use App\Http\Controllers\pedidos_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pedidos', [pedidos_controller::class, 'pedidos'])->name('pedidos');
Route::post('/pedidos', [pedidos_controller::class, 'salvar'])->name('pedidos');
