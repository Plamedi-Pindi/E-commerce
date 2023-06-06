<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function estoque(){
        return $this->hasOne('App\Models\Estoque');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // public function user(){
    //     return $this->belongsTo(User::class, 'id_user');
    // }

}
