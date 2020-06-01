<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';
    protected $primaryKey = 'id';

    function categoria(){
    	return $this->belongsTo('App\Categoria', 'id_categoria', 'id');
    }
    function venda(){
    	return $this->belongsToMany('App\Venda', 'produtos_vendas', 'id_produto', 'id_venda')
    	->withPivot(['quantidade', 'subtotal'])->withTimestamps();
    }
    function fotos(){
    	return $this->hasMany('App\Foto', 'id_produto', 'id');
    }
}
