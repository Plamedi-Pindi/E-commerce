<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    // protected $foreignKey = 'id_produto';
    public function produto(){
        return $this->belongsTo(Produto::class, 'produto_id');

    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');

    }
}
