<?php

use Illuminate\Database\Seeder;
use App\Pizzaria;
class PizzariaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Pizzaria::truncate();
      $pizzarias = [
        [
          "nome"=>"Pizzaria Catchupa",
          "contacto"=>"935524377",
          "email"=>"pizzariacatchupa@hotmail.com",
          "endereco"=>"Chiweca",
          "imagem"=>"",
          "username"=>"pizzariacatchupa",
          "password"=> bcrypt("1234567890"),
          "descricao"=>"hahahahahahhahahahahahahahahhahahahahahahahahahahahahahahahahhahahahahahahahahaha"
        ],
        [
          "nome"=>"Pizzaria Cabinda",
          "contacto"=>"935524377",
          "email"=>"pizzariacabinda@gmail.com",
          "endereco"=>"Mangui-Seco",
          "imagem"=>"",
          "username"=>"pizzariacabinda",
          "password"=> bcrypt("0987654321"),
          "descricao"=>"kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk"
        ],
        [
          "nome"=>"Pizzaria Tchizo",
          "contacto"=>"935524377",
          "email"=>"pizzariatchizo@gmail.com",
          "endereco"=>"Lu",
          "imagem"=>"",
          "username"=>"pizzariatchizo",
          "password"=> bcrypt("0987654321"),
          "descricao"=>"kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk"
        ]
      ];

        foreach ($pizzarias as $key => $pizzaria) {
          $pizzSeed = Pizzaria::create($pizzaria);
        }
    }
}
