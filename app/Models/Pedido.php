<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['id_user'];

    public function itemPedido(){
        return $this->hasMany('App\Models\Item_pedido');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function estado(){
        return $this->belongsTo(EstadoPedido::class, 'id_estado');
    }
}
