<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $gender = ['male', 'female'];
    return [
      'primeironome' => $faker->firstname,
      'sobrenome'=> $faker->lastname,
      'endereco'=> $faker->address,
      'sexo'=> $gender[random_int(0,1)],
      'contacto'=> $faker->numberBetween(10),
      'email'=> $faker->unique()->safeEmail,
      'password'=> $password ?: $password = bcrypt('secret'),
      'remember_token' => str_random(10),
    ];
});

$factory->define(App\Pizzaria::class, function (Faker\Generator $faker) {
    static $password;
    return [
      'nome' => $faker->name,
      'contacto'=> $faker->numberBetween(10),
      'email'=> $faker->unique()->safeEmail,
      'endereco'=> $faker->address,
      'imagem'=> $faker->lastname,
      'username'=> slug($faker->name),
      'password'=> $password ?: $password = bcrypt('secret'),
      'descricao'=> $faker->text(),
      'remember_token' => str_random(10),
    ];
});
