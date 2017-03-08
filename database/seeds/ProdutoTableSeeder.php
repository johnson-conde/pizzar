<?php

use Illuminate\Database\Seeder;
use App\Produto;
class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      Produto::truncate();
        foreach(range(1,10) as $key =>$number) {
          $produto = Produto::create([
              "pizzaria_id" => random_int(1, 3),
              "categoria_id" => random_int(1, 6),
              "nome" => "Produto {$key}" ,
              "imagem" => "",
              "descricao" => $faker->text(),
              "preco" => random_int(1500, 50000)/10,
              "quantidade" => random_int(10, 100),
            ]);
        }
    }
}
