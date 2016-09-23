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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Sucursal::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->company,
        'ciudad_id' => $faker->numberBetween($min = 1, $max = 1000),
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->tollFreePhoneNumber,
    ];
});

$factory->define(App\Models\Admin\activo_fijo::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->text(250),
        'marca' => $faker->safeColorName,
        'modelo' => $faker->swiftBicNumber,
        'fecha_adquisicion' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'valor_compra' => $faker->randomNumber(5),
        'cantidad' => $faker->randomNumber(2),
    ];
});

$factory->define(App\Models\Tercero::class, function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->text(10),
        'regimen' => $faker->text(15),
        'gran_contribuyente' => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});

/*
$factory->define(App\Widget::class, function ($faker) {
   return [
       'widget_name' => $faker->unique()->word,

   ];
});
*/