<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Tag;

$factory->define(Tag::class, function (Faker $faker){
    return [
        'name' => $faker->name(),
    ];
});
