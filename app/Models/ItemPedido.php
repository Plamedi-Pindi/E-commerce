<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['quantidade', 'precoUnitario', 'id_pedido', 'id_produto'];

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    public function produto(){
        return $this->belongsTo(Produto::class, 'id_produto');
    }
}
