<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{

    protected $fillable = ['imagem'];
    use HasFactory;

    public function categoria(){

        return $this->BelongsTo(Categoria::class, 'id_categoria');
    }

    public function user(){

        return $this->BelongsTo(user::class, 'id_user');
    }
}
