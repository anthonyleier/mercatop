<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id';

    function produto(){
    	return $this->hasMany('App\Produto', 'id_categoria', 'id');
    }
}
