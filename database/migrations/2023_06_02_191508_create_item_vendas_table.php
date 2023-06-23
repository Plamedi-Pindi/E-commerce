<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_vendas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('quantidade');
            $table->double('precoUnitario');

            $table->integer('id_produto');
            $table->foreign('id_produto')->on('produtos')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_venda');
            $table->foreign('id_venda')->on('vendas')->references('id')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('item_vendas');
    }
}
