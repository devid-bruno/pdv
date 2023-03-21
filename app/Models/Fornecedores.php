<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Fornecedores extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'cnpj', 'endereco', 'descricao', 'categoria_id'];

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class);
    }
}
