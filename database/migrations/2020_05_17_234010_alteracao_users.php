<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlteracaoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->integer('permissao'); //0 = Usuario Cliente ou 1 = Usuario Administrador
            $table->string('cpf', 11);
            $table->string('rg', 15);
            $table->date('dataNascimento');
            $table->string('telefone', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('permissao');            
            $table->dropColumn('cpf');            
            $table->dropColumn('rg');            
            $table->dropColumn('dataNascimento');            
            $table->dropColumn('telefone');
        });
    }
}
