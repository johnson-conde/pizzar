<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoDePagamento extends Model
{
  protected $table = "metodos_de_pagamento";
  protected $fillable = [
    "id",
    "nome",
    "created_at",
    "updated_at",
  ];

  function encomendas(){
    return $this->hasMany("App\Encomenda");
  }
}
