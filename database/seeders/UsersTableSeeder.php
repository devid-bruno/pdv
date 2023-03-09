<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'T.I.',
            'email' => 'ti2@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3, // ID da função "T.I."
        ]);
    }
}
