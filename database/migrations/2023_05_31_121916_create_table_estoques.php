<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEstoques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_estoques', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('quantidade');
            $table->date('data');
            $table->integer('limite_max');
            $table->integer('limite_min');

            $table->integer('id_produto');
            $table->foreign('id_produto')->on('produtos')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('table_estoques');
    }
}
