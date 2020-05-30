<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
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
