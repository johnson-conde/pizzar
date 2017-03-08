<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacoesTable extends Migration
{
  var $options;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->options = [1,2,3,4,5];
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('custo_e_beneficio_avaliacao', $this->options)
                  ->default($this->options[0]);
            $table->enum('tempo_de_entrega_avaliacao', $this->options)
                  ->default($this->options[0]);
            $table->enum('qualidade_avaliacao', $this->options)
                  ->default($this->options[0]);
            $table->integer('encomenda_id')->unsigned();
            $table->foreign('encomenda_id')
            ->references('id')
            ->on('encomendas')
            ->onDelete('cascade');
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
        Schema::dropIfExists('avaliacoes');
    }
}
