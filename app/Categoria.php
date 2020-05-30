<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';

    function produto(){
    	return $this->hasMany('App\Produto', 'id_categoria', 'id');
    }
}
