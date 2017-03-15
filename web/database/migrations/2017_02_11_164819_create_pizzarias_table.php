<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzarias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('contacto');
            $table->string('email')->nullable();
            $table->string('endereco');
            $table->string('imagem');
            $table->string('username')->unique();
            $table->string('password');
            $table->text('descricao');
            $table->rememberToken();
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
        Schema::dropIfExists('pizzarias');
    }
}
