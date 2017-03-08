<?php

use Illuminate\Database\Seeder;
use App\MetodoDePagamento;
class MetodosDePagamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      MetodoDePagamento::truncate();
      $metodos_de_pagamento = [
        [
          "nome"=>"Cash",
        ],
      ];

        foreach ($metodos_de_pagamento as $key => $metodo) {
          $meed = MetodoDePagamento::create($metodo);
        }
    }
}
