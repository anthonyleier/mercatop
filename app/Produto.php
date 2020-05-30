<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'id';

    function categoria(){
    	return $this->belongsTo('App\Categoria', 'id_categoria', 'id');
    }
    function venda(){
    	return $this->belongsToMany('App\Venda', 'produto_venda', 'id_produto', 'id_venda')
    	->withPivot(['quantidade', 'subtotal'])->withTimestamps();
    }
    function fotos(){
    	return $this->hasMany('App\Foto', 'id_produto', 'id');
    }
}
