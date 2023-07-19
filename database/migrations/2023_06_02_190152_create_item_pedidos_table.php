<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pedidos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('quantidade');
            $table->double('precoUnitario');

            $table->integer('pedido_id');
            $table->foreign('pedido_id')->on('pedidos')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_produto');
            $table->foreign('id_produto')->on('produtos')->references('id')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('item_pedidos');
    }
}
