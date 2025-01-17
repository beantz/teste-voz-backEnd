<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('login.autenticacao');
Route::get('/login/sair', [LoginController::class, 'destroy'])->name('login.sair');

//grupo pra reuir todas as rotas que precisam de autenticação para serem acessadas
Route::middleware('autenticacao')->prefix('/adm')->group( function() {

    //retornar view adm
    Route::get('/adm', [LoginController::class, 'auth'])->name('adm.index');

    //retornar view para cadastrar
    Route::get('/produtos/cadastrar/{id?}', [ProdutosController::class, 'create'])->name('view.cadastrar.produtos');
    Route::post('/produtos/{id?}', [ProdutosController::class, 'create'])->name('cadastrar.produto');
    Route::put('/produtos/{id}', [ProdutosController::class, 'update'])->name('atualizar.produto');
    Route::delete('/produtos/{id}', [ProdutosController::class, 'delete'])->name('deletar.produto');

    //retornar view para cadastrar categorias
    Route::get('/categorias/cadastrar/{id?}', [CategoriasController::class, 'create'])->name('view.cadastrar.categorias');
    Route::post('/categorias/{id?}', [CategoriasController::class, 'create'])->name('cadastrar.categorias');
    Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('atualizar.categorias');
    Route::delete('/categorias/{id}', [CategoriasController::class, 'delete'])->name('deletar.categorias');

});

//rotas produtos que nao precisam de autenticacao
Route::get('/produtos', [ProdutosController::class, 'Products'])->name('visualizar.produtos');
Route::get('/produtos/{id}', [ProdutosController::class, 'viewProduct'])->name('visualizar.produto');

//rotas categorias que nao precisam de autenticacao
Route::get('/categorias', [CategoriasController::class, 'Categories'])->name('visualizar.categorias');
Route::get('/categorias/{id}', [CategoriasController::class, 'viewCategory'])->name('visualizar.categoria');

//rota caso a rota informada não esteja sendo encontrada
Route::fallback( function() {
    /*quando fizer a view login esse redirect aqui tem que retornar para o index de login*/
    echo 'Rota não encontrada! Acesse <a href="'.route('login.autenticacao').'">Login</a> Para fazer login.';
});