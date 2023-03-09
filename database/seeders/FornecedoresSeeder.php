<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FornecedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fornecedor::create([
            'nome_fornecedor' => 'X',
            'telefone' => '(85)99999-9999',
            'endereco' => 'Av X, 651, X Fortaleza - CE',
            'cnpj' => '4358698540000145',
        ]);


    }
}
