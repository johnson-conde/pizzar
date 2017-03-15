<?php

use Illuminate\Database\Seeder;
use App\PontoDeEntrega;
class PontosDeEntregaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PontoDeEntrega::truncate();
      $pontos_de_entrega = [
        [
          "nome"=>"Rotunda do 1 de Maio",
          "endereco"=>"1 de Maio",
          "latitude"=>"0.5",
          "longitude"=>"0.9",
          "comentario"=>"blablablablablabla",
        ],
        [
          "nome"=>"Escola Santa Madalena",
          "endereco"=>"Bairro Uneca",
          "latitude"=>"0.6",
          "longitude"=>"0.7",
          "comentario"=>"blablablablablabla",
        ],
        [
          "nome"=>"Portas do Tchizo",
          "endereco"=>"Nissan",
          "latitude"=>"0.7",
          "longitude"=>"0.10",
          "comentario"=>"blablablablablabla",
        ]
      ];

        foreach ($pontos_de_entrega as $key => $ponto_de_entrega) {
          $pSeed = PontoDeEntrega::create($ponto_de_entrega);
        }
    }
}
