<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'primeironome' ,
         'sobrenome',
         'endereco',
         'sexo',
         'contacto',
         'email',
         'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getFullnameAttribute(){
      return $this->primeironome . ' ' . $this->sobrenome;
    }
    
    function encomendas(){
      return $this->hasMany('App\Encomenda');
    }
}
