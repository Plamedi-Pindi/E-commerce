<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'produtos';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];



    public function estoque()
    {
        return $this->hasMany(Estoque::class, 'produto_id');
    }


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function itemPedidos()
    {
        return $this->hasMany(Item_pedido::class, 'produto_id', 'id');
    }


}
