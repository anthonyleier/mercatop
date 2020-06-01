<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_venda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produto');
            $table->unsignedBigInteger('id_venda');
            $table->decimal('quantidade', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();

            $table->foreign('id_produto')->references('id')->on('produto');
            $table->foreign('id_venda')->references('id')->on('venda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_venda');
    }
}
