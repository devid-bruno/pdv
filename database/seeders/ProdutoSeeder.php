<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
            'nome_produto' => 'Cimento Nassau',
            'categoria_id' => 1,
            'fornecedor_id' => 1,
            'quantidade' => 1,
            'marca' => 'Nassau',
            'descricao' => 'Cimento nassau 50kg',
            'tipo_entrega' => 'caminhao',
            'tipo_pagamento' => 'Pix',
            'valor_unitario' => '34,50',
            'valor_total' => '34,50'
        ]);
    }
}
