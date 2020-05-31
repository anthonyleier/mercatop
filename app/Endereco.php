<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;
	protected $table = 'enderecos';
    protected $primaryKey = 'id';

    function cidade(){
        return $this->belongsTo('App\Cidade', 'id_cidade', 'id');
    }

    function user(){
        return $this->belongsTo('App\User', 'id_cliente', 'id');
    }

    function vendas(){
        return $this->hasMany('App\Venda', 'id_venda', 'id');
    }
}
