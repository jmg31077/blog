<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('noticia_id')->unsigned();
            $table->integer('categoria_id')->unsigned();

            $table->foreign('noticia_id')
            ->references('id')
            ->on('noticias')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
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
        Schema::dropIfExists('noticias_categorias');
    }
}
