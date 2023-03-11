<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagamentofornecedor extends Model
{
    use HasFactory;

    public function formaPagamento()
{
    return $this->belongsTo(formapagamento::class, 'forma_pagamento_id');
}

}
