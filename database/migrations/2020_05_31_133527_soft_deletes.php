<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorias', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('cidades', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('enderecos', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('produtos', function(Blueprint $table){
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('cidades', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('enderecos', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('produtos', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
}
