<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->double('totla');
            $table->dateTime('data');
            $table->string('ref_pagamento');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });

        Schema::create('Pedido_venda', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();

            $table->unsignedBigInteger('id_pedido');
            $table->foreign('id_pedido')->on('pedidos')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_venda');
            $table->foreign('id_venda')->on('vendas')->references('id')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
