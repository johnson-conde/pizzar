<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
  protected $table = "avalicoes";
  protected $fillable = [
    "id",
    "custo_e_beneficio_avaliacao",
    "tempo_de_entrega_avaliacao",
    "qualidade_avaliacao",
    "encomenda_id",
    "comentario",
    "created_at",
    "updated_at",
  ];

  function encomenda(){
    return $this->belongsTo("App\Encomenda");
  }
}
