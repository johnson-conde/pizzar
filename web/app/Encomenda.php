<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
  protected $table = "encomendas";
  protected $fillable = [
    "id",
    "usuario_id",
    "pizzaria_id",
    "pontos_de_entrega_id",
    "encomenda_id",
    "metodo_de_pagamento_id",
    "razao",
    "estado",
    "subtotal",
    "comentario",
    "total",
    "created_at",
    "updated_at",
  ];

  function usuario(){
    return $this->belongsTo("App\User");
  }
  function pontoDeEntregas(){
    return $this->hasOne("App\PontoDeEntrega");
  }
  function metodoDePagamento(){
    return $this->hasOne("App\MetodoePagamento");
  }
  function avaliacao(){
    return $this->hasOne("App\Avaliacao");
  }
  function pizzaria(){
    return $this->belongsTo("App\Pizzaria");
  }
  function itemsDaEncomenda(){
      return $this->hasMany("App\ItemDaEncomenda");
  }
}
