<?php

use Illuminate\Support\Facades\DB;
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

        Schema::table('pedidos', function(Blueprint  $table){

            //tranformando pagamento_id em uma fk
            $table->foreign('pagamento_id')->references('id')->on('pagamento');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('pedidos', function(Blueprint $table){

            $table->dropForeign('pedidos_pagamento_id_foreign');
            $table->dropColumn('pagamento_id');

        });

        Schema::dropIfExists('pagamento');

    }
};
