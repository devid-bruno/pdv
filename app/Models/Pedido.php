<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function cliente()
{
    return $this->belongsTo(Cliente::class);
}

public function produtos()
{
    return $this->belongsToMany(Produto::class)->withPivot('quantidade', 'preco');
}

public function vendas()
    {
        return $this->hasMany(vendas::class);
    }


}
