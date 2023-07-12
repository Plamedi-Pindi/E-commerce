<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->double('total', 10, 2);
            $table->dateTime('data');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('id_estado');
            $table->foreign('id_estado')->on('estado_pedidos')->references('id')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('pedidos');
    }
}
