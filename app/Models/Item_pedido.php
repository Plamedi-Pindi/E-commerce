<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_pedido extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['quantidade', 'precoUnitario', 'pedido_id', 'id_produto'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }

}
