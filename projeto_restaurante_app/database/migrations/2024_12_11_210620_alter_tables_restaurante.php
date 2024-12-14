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
        //
        Schema::table('pedidos', function(Blueprint $table){

            $table->timestamps();

        });

        Schema::table('bebidas', function(Blueprint $table){

            $table->timestamps();

        });

        Schema::table('refeições', function(Blueprint $table){

            $table->timestamps();

        });

        Schema::table('refeições saudaveis', function(Blueprint $table){

            $table->timestamps();

        });

        Schema::table('total pedido', function(Blueprint $table){

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
