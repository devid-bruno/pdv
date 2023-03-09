<?php

namespace Database\Seeders;
use App\Models\Preco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Preco::create(['preco' => '34,90']);
    }
}
