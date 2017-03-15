<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use Searchable;
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

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'produtos_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        // Customize array...
        return $array;
    }
}
