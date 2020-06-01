<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria_produto', function (Blueprint $table) {
            $table->string('categoria_pai', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria_produto', function (Blueprint $table) {
            $table->string('categoria_pai', 255)->change();
        });
    }
}
