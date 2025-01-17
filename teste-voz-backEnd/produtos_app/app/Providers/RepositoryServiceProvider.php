<?php

namespace App\Providers;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use App\Http\Requests\StorePostRequest;
use App\Interfaces\CategoriasRepositoryInterface;
use App\Interfaces\ProdutosRepositoryInterface;
use App\Repository\CategoriasRepository;
use App\Repository\ProdutosRepository;
use App\Repository\Response\Response;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProdutosRepositoryInterface::class, ProdutosRepository::class);
        $this->app->bind(CategoriasRepositoryInterface::class, CategoriasRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
