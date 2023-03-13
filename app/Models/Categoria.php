<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria'
    ];

    public function fornecedores()
    {
        return $this->belongsToMany(Fornecedor::class);
    }

}
