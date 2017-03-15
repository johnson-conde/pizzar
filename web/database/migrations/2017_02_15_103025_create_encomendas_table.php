<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncomendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
            ->references('id')
            ->on('usuarios')
            ->onDelete('cascade');
            $table->integer('pizzaria_id')->unsigned();
            $table->foreign('pizzaria_id')
                  ->references('id')
                  ->on('pizzarias')
                  ->onDelete('cascade');
            $table->integer('pontos_de_entrega_id')->unsigned();
            $table->foreign('pontos_de_entrega_id')
            ->references('id')
            ->on('pontos_de_entrega')
            ->onDelete('cascade');
            $table->integer('metodo_de_pagamento_id')->unsigned();
            $table->foreign('metodo_de_pagamento_id')
            ->references('id')
            ->on('metodos_de_pagamento')
            ->onDelete('cascade');
            $table->string('razao')->nullable();
            $table->enum('estado', ['encomendado','entregue','cancelado']);
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->text('comentario');
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
        Schema::dropIfExists('encomendas');
    }
}
