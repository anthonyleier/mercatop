<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'id';

    function user(){
    	return $this->belongsTo('App\User', 'id_cliente', 'id');
    }

    function produtos(){
    	return $this->belongsToMany('App\Produto', 'produtos_vendas', 'id_venda', 'id_produto')->withPivot(['quantidade', 'subtotal', 'id'])->withTimestamps();
    }

    function endereco(){
    	return $this->belongsTo('App\Endereco', 'id_endereco', 'id');
    }
}
