
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
        //criando tabela de pedidos
        Schema::create('pedidos', function(Blueprint $table){

            $table->id();
            $table->string('nome', 100);
            $table->string('refeição');
            $table->string('bebida');
            $table->integer('forma de pagamento');

        });

        //criando a tabela de comidas
        Schema::create('refeições', function(Blueprint $table) {

            $table->id();
            $table->string('nome', 100);
            $table->decimal('preço', 8, 2);

        });

        //criando a tabela de comidas saudaveis
        Schema::create('refeições saudaveis', function(Blueprint $table) {

            $table->id();
            $table->string('nome', 100);
            $table->decimal('preço', 8, 2);

        });

        //criando a tabela de bebidas
        Schema::create('bebidas', function(Blueprint $table) {

            $table->id();
            $table->string('nome', 100);
            $table->decimal('preço', 8, 2);

        });

        Schema::create('total pedido', function(Blueprint $table){

            $table->id();
            $table->string('nome', 100);
            $table->unsignedBigInteger('refeição_id');
            $table->unsignedBigInteger('refeição_saudaveis_id');
            $table->unsignedBigInteger('bebida_id');
            $table->decimal('total', 8, 2);

            //chaves estrangeiras
            $table->foreign('refeição_id')->references('id')->on('refeições');
            $table->foreign('refeição_saudaveis_id')->references('id')->on('refeições saudaveis');
            $table->foreign('bebida_id')->references('id')->on('bebidas');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('total pedido', function(Blueprint $table){

            $table->dropForeign('total pedido_refeição_id_foreign');
            $table->dropForeign('total pedido_refeição_saudaveis_id_foreign');
            $table->dropForeign('total pedido_bebida_id_foreign');

        });

        Schema::dropIfExists('bebidas');
        Schema::dropIfExists('refeições saudaveis');
        Schema::dropIfExists('refeições');
        Schema::dropIfExists('total pedido');
        Schema::dropIfExists('pedidos');
        
    }
};
