<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_pedido extends Model
{
    use HasFactory;

    public function pedidos(){
        return $this->hasOne('App\Models\Pedido');
    }

}
