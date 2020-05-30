<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::rename('categoria', 'categorias');        
        Schema::rename('foto', 'fotos');
        Schema::rename('produto', 'produtos');
        Schema::rename('produto_venda', 'produtos_vendas');
        Schema::rename('venda', 'vendas');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {               
        Schema::rename('categorias', 'categoria');        
        Schema::rename('fotos', 'foto');
        Schema::rename('produtos', 'produto');
        Schema::rename('produtos_vendas', 'produto_venda');
        Schema::rename('vendas', 'venda');
    }
}
