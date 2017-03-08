<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Categoria::truncate();
      $categorias = [
      [
            "id" =>  "1",
            "nome" =>  "Pizzas",
            "created_at" =>  "2017-02-18 19:10:28",
            "updated_at" =>  "2017-02-18 19:10:28"

        ], [
            "id" =>  "2",
            "nome" =>  "Bebidas",
            "created_at" =>  "2017-02-18 19:10:28",
            "updated_at" =>  "2017-02-18 19:10:28"
        ], [
            "id" =>  "3",
            "nome" =>  "Pratos",
            "created_at" =>  "2017-02-18 19:10:28",
            "updated_at" =>  "2017-02-18 19:10:28"
        ], [
            "id" =>  "4",
            "nome" =>  "Tostas e Sandes",
            "created_at" =>  "2017-02-18 19:10:28",
            "updated_at" =>  "2017-02-18 19:10:28"
        ], [
            "id" =>  "5",
            "nome" =>  "Quentes",
            "created_at" =>  "2017-02-18 19:10:28",
            "updated_at" =>  "2017-02-18 19:10:28"
        ], [
            "id" =>  "6",
            "nome" =>  "Saladas",
            "created_at" =>  "2017-02-18 19:10:28",
            "updated_at" =>  "2017-02-18 19:10:28"
        ]];

        foreach ($categorias as $key => $categoria) {
          $catSeed = Categoria::create($categoria);
        }
    }
}
