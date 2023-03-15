<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendas extends Model
{
    use HasFactory;
    protected $table = 'vendas';
    protected $fillable = ['nome_cliente', 'email_cliente', 'cpf_cnpj_cliente', 'telefone_cliente', 'endereco_cliente', 'forma_pagamento', 'quantidade', 'valor_total', 'estoque_id'];

    public function fornecedor()
     {
         return $this->belongsToMany(Fornecedor::class);
     }
}
