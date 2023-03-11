<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fornecedores extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_fornecedor', 'telefone', 'endereco', 'cnpj'
    ];

    public function formasPagamento()
{
    return $this->belongsToMany(FormaPagamento::class, 'fornecedor_forma_pagamento', 'fornecedor_id', 'forma_pagamento_id');
}

public function pagamentos()
{
    return $this->hasMany(PagamentoFornecedor::class, 'fornecedor_id');
}

}
