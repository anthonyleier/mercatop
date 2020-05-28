<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'id';

    function categoria_produto(){
    	return $this->belongsTo('App\Produto', 'id_categoria', 'id');
    }
    function venda(){
    	return $this->belongsToMany('App\Produto', 'produto_venda', 'id_produto', 'id_venda')
    	->withPivot(['quantidade', 'subtotal'])->withTimestamps();
    }
}
