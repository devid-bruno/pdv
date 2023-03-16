<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_cliente',
        'email_cliente',
        'cpf_cnpj_cliente',
        'telefone_cliente',
        'cep_cliente',
        'endereco_cliente',
    ];

    public function vendas()
    {
        return $this->hasMany(vendas::class);
    }

}
