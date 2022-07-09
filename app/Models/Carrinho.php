<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'venda';

    protected $fillable = [
        'data_hora',
        'usuario_id',
        'comprado'
    ];

    public function itens(): HasMany
    {
        return $this->hasMany(ItensCarrinho::class, 'venda_id', 'id');
    }

    public function total(): Attribute
    {
        return Attribute::make(
            get: function(){
                $itens = $this->itens;
                if (empty($itens)){
                    return 0;
                }

                return $this->itens->reduce(function($carry, $item){
                    return (!empty($carry) ? $carry : 0) + $item['total'];
                });
            }
        );
    }

}
