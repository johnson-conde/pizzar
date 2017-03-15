<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsDaEncomendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_da_encomenda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')
            ->references('id')
            ->on('produtos')
            ->onDelete('cascade');
            $table->integer('encomenda_id')->unsigned();
            $table->foreign('encomenda_id')
            ->references('id')
            ->on('encomendas')
            ->onDelete('cascade');
            $table->integer('quantidade');
            $table->decimal('subtotal');
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
        Schema::dropIfExists('items_da_encomenda');
    }
}
