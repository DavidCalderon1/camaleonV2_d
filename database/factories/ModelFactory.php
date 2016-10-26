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

/* tabla user */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

/* tabla sucursal */
$factory->define(App\Models\Sucursal::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->company,
        'ciudad_id' => $faker->numberBetween($min = 1, $max = 1000),
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->tollFreePhoneNumber,
    ];
});

/* tabla activo_fijo */
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

/* tabla transaccion */
$factory->define(App\Models\Admin\transaccion::class, function (Faker\Generator $faker) {
    return [
        'fecha' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'tdc_id' => $faker->numberBetween($min = 1, $max = 4),
        'descripcion' => $faker->text(250),
        'auto' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});

/* tabla movimiento_contable */
$factory->define(App\Models\Admin\movimiento_contable::class, function (Faker\Generator $faker) {
    return [
        //'trs_id' => $faker->numberBetween($min = 1, $max = 20),
        'suc_id' => $faker->numberBetween($min = 1, $max = 20),
        'cntaux_id' => $faker->numberBetween($min = 1, $max = 100),
        'debe' => $faker->numberBetween($min = 0, $max = 100000),
        'haber' => $faker->numberBetween($min = 0, $max = 100000),
        'detalle' => $faker->text(250),
        'auto' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});

/* tabla persona */
$factory->define(App\Models\Persona::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName($gender = null|'male'|'female'),
        'apellido' => $faker->lastName,
        'tipo_documento' => $faker->randomElement($array = array ('CEDULA CIUDADANIA','CEDULA EXTRANJERIA','PASAPORTE')),
        'documento' => $faker->numberBetween($min = 1000000, $max = 100000000),
        'ciudad_id' => $faker->numberBetween($min = 1, $max = 1000),
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->tollFreePhoneNumber,
    ];
});

/* tabla empresa */
$factory->define(App\Models\Empresa::class, function (Faker\Generator $faker) {
    return [
        'nit' => $faker->numberBetween($min = 10000000, $max = 9000000000),
        'razon_social' => $faker->company,
        'naturaleza' => $faker->randomElement($array = array ('PUBLICA','MIXTA','PRIVADA')),
        'fecha_constitucion' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
        'ciudad_id' => $faker->numberBetween($min = 1, $max = 1000),
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->tollFreePhoneNumber,
    ];
});

/* tabla tercero */
$factory->define(App\Models\Tercero::class, function (Faker\Generator $faker) {
    return [
        'tipo' => $faker->randomElement($array = array ('NATURAL','JURIDICA')),
        'regimen' => $faker->randomElement($array = array ('SIMPLIFICADO','COMUN')),
        'gran_contribuyente' => $faker->boolean($chanceOfGettingTrue = 50),
    ];
});

/* tabla materia_prima */
$factory->define(App\Models\Materia_Prima::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->swiftBicNumber,
        'nombre' => $faker->colorName,
        'caracteristicas' => $faker->text(250),
        'unidad_medida' => $faker->locale,
    ];
});
/*
$factory->define(App\Widget::class, function ($faker) {
   return [
       'widget_name' => $faker->unique()->word,

   ];
});
*/