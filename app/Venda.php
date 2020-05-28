<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';
    protected $primaryKey = 'id';

    function user(){
    	return $this->belongsTo('App\User', 'id_cliente', 'id');
    }

    function produto(){
    	return $this->belongsToMany('App\Produto', 'produto_venda', 'id_venda', 'id_produto')->withPivot(['quantidade', 'subtotal', 'id'])->withTimestamps();
    }
}
