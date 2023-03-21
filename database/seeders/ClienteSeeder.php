<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome_cliente' => 'cliente1',
            'telefone_cliente' => '(85)99999-9999',
            'endereco_cliente' => 'Rua raimundo feitosa, 825 montesee',
            'email_cliente' => 'cliente1@gmail.com',
            'telefone2_cliente' => '(85)99999-9999'
        ]);
    }
}
