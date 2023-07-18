<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_produto extends Model
{
    use HasFactory;

    public function produtos(){
        return $this->hasMany('App\Models\Produto');
    }
}
