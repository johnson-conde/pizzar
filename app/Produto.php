<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";
    protected $fillable = [
      "produto_id",
      "categoria_id",
      "nome",
      "imagem",
      "descricao",
      "preco",
      "quantidade",
      "pizzaria_id",
      "created_at",
      "updated_at"
    ];

    function pizzaria(){
      return $this->belongsTo("App\Pizzaria");
    }

    function categoria(){
      return $this->belongsTo("App\Categoria");
    }
}
