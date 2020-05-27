<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProduto extends Model
{
    protected $table = 'categoria_produto';
    protected $primaryKey = 'id';

    function produto(){
    	return $this->hasMany('App\Produto', 'id_categoria', 'id');
    }
}
