<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //usei seeders  para inserir informações que serão necessarias na inicialização do sistema
        Categorias::create(['nome' => 'padaria']);
        Categorias::create(['nome' => 'bebidas']);
        Categorias::create(['nome' => 'limpeza']);
        Categorias::create(['nome' => 'carnes']);
        Categorias::create(['nome' => 'higiene']);
        Categorias::create(['nome' => 'hortifruti']);
        Categorias::create(['nome' => 'mercearia']);
    }
}
