<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Categorias', function(Blueprint $table){
            $table->id();
            $table->string('nome', 40);

            $table->timestamps();
        });

        Schema::create('Produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->text('descricao', 150);
            $table->float('preco', 8, 2);
            $table->unsignedBigInteger('categoria_id');

            $table->foreign('categoria_id')->references('id')->on('Categorias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*excluir tabela categorias*/
        Schema::dropIfExists('Categorias');

        Schema::table('Produtos', function(Blueprint $table) {

            $table->dropForeign('categorias_id');

        });

        Schema::dropIfExists('Produtos');
    }
};
