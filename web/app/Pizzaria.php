<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pizzaria extends Authenticatable
{
  use Notifiable;
  // const CREATED_AT = 'date_created';
  // const UPDATED_AT = 'date_modified';
  protected $fillable = [
    "nome",
    "contacto",
    "email",
    "endereco",
    "imagem",
    "username",
    "password",
    "descricao",
    "created_at",
    "updated_at"
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  function produtos(){
    return $this->hasMany(\App\Produto::class);
  }

  function encomendas(){
    return $this->hasMany(\App\Encomenda::class);
  }
}
