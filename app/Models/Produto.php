<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_produto',
        'categoria_id',
        'fornecedor_id',
        'quantidade',
        'marca',
        'descricao',
        'tipo_entrega',
        'tipo_pagamento',
        'valor_unitario',
        'valor_total',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
