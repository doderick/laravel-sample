<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Status::class, function (Faker $faker) {

    // 创建faker时间
    $updated_at = $faker->dateTimeBetween('-3years');
    $created_at = $faker->dateTimeBetween('-3years', $updated_at);

    return [
        'content'    => $faker->text(),
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
