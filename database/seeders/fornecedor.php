<?php

namespace Database\Seeders;

use App\Models\fornecedores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class fornecedor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        fornecedores::create([
            'nome_fornecedor' => 'X',
            'telefone' => '(85)99999-9999',
            'endereco' => 'Av X, 651, X Fortaleza - CE',
            'cnpj' => '4358698540000145',
        ]);
    }
}
