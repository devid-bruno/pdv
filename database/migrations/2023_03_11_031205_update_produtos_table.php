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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('fornecedor_id');
            $table->integer('quantidade');
            $table->string('marca');
            $table->text('descricao');
            $table->string('tipo_entrega');
            $table->string('tipo_pagamento');
            $table->string('valor_unitario');
            $table->string('valor_total');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
