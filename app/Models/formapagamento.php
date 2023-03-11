<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formapagamento extends Model
{
    use HasFactory;

    public function fornecedor()
{
    return $this->belongsToMany(fornecedores::class, 'fornecedor_forma_pagamento', 'forma_pagamento_id', 'fornecedor_id');
}

}
