<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{

    protected $fillable = ['imagem'];
    use HasFactory;

    public function caregoria(){

        return $this->BelongsTo('App\Models\Categoria');
    }
}
