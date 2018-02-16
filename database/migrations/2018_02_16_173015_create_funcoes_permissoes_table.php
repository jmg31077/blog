<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncoesPermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcoes_permissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('funcao_id')->unsigned();
            $table->integer('permissao_id')->unsigned();

            $table->foreign('funcao_id')
                ->references('id')
                ->on('funcoes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('permissao_id')
                ->references('id')
                ->on('permissoes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
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
        Schema::dropIfExists('funcoes_permissoes');
    }
}
