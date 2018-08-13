<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {

    // 创建faker时间
    $updated_at = $faker->dateTimeBetween('-5years');
    $created_at = $faker->dateTimeBetween('-5years', $updated_at);

    // 使用静态密码以节省资源
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: bcrypt('222222'),
        'remember_token' => str_random(10),
        'created_at'     => $created_at,
        'updated_at'     => $updated_at,
        'is_activated'   => true,
        'can_rename'     => true,
        'is_admin'       => false
    ];
});
