<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PontoDeEntrega extends Model
{
  protected $table = "pontos_de_entrega";
  protected $fillable = [
    "id",
    "nome",
    "endereco",
    "latitude",
    "longitude",
    "comentario"
  ];

  function encomendas(){
    return $this->hasMany("App\Encomenda");
  }
}
