<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 255);
            $table->string('logradouro', 255);
            $table->string('numero', 10);
            $table->string('bairro', 255);
            $table->unsignedBigInteger('id_cidade');            
            $table->unsignedBigInteger('id_cliente');

            $table->foreign('id_cidade')->references('id')->on('cidades');            
            $table->foreign('id_cliente')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
}
