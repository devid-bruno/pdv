<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'valor_unitario',
        'valor_bruto',
        'quantidade',
        'fornecedor_id'
    ];

    public function fornecedor()
     {
         return $this->belongsToMany(Fornecedor::class);
     }
}
