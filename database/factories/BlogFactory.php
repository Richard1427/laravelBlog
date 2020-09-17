<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    // 使用 Faker 类为我们提供的生成随机伪造数据的方法生成数据
    return [
        'title' => $faker->name,
        'content' => $faker->text,
    ];
});
