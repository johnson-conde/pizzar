<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDaEncomenda extends Model
{
  protected $table = "items_da_encomenda";
  protected $fillable = [
    "id",
    "produto_id",
    "encomenda_id",
    "quantidade",
    "subtotal",
    "created_at",
    "updated_at",
  ];

  function encomenda(){
    return $this->belongsTo("App\Encomenda");
  }

  function produto(){
    return $this->belongsTo("App\Produto");
  }
}
