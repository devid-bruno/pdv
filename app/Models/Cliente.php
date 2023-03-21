<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome_cliente', 'telefone_cliente', 'endereco_cliente', 'email_cliente', 'telefone2_cliente'];
}
