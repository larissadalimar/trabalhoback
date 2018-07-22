<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('número');
            $table->string('data');
            $table->string('quantidade');
            $table->integer('id_produto')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->timestamps();
        });

        Schema::table('pedidos', function (Blueprint $table) {
          $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('set null');
          $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('set null');
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
