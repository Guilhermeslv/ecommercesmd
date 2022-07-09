<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItensCarrinho extends Model
{
    protected $table = 'venda_produto';

    public $timestamps = false;

    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade'
    ];


    public function produto(): HasOne
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }

    public function total(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->attributes['quantidade'] * $this->produto->preco
        );
    }
}
