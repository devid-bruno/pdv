<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['categoria'];

    public function fornecedores(): BelongsToMany
    {
        return $this->belongsToMany(Fornecedores::class);
    }
}
