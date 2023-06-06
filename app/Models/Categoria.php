<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['slug'];
    

    public function produto(){
        return $this->hasMany('App\Model\Produto');
    }

}
