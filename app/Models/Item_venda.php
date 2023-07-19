<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_venda extends Model
{
    use HasFactory;

    public function itemVenda(){

        return $this->belongsTo(Venda::class, 'id_venda');
    }
}
