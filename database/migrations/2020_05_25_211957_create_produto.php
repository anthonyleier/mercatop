<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
           $table->id();
           $table->string('nome', 255);
           $table->integer('quantidade');
           $table->decimal('valor', 20, 2);
           $table->string('descricao', 255);
           $table->string('slug', 255);
           $table->unsignedBigInteger('id_categoria');
           $table->timestamps();

           $table->foreign('id_categoria')->references('id')->on('categoria_produto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto');
    }
}
