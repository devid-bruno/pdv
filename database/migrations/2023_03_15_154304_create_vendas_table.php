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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estoque_id');
            $table->foreign('estoque_id')->references('id')->on('estoques')->onDelete('cascade');
            $table->string('nome_cliente');
            $table->string('email_cliente');
            $table->string('cpf_cnpj_cliente');
            $table->string('telefone_cliente');
            $table->string('endereco_cliente');
            $table->string('forma_pagamento');
            $table->integer('quantidade');
            $table->decimal('valor_total', 10, 2);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
