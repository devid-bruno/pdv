<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendas extends Model
{
    use HasFactory;


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
