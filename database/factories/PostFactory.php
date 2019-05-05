<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'author_id' => 1,
        'title' => 'My Blog Post',
        'body' => 'Hello world!'
    ];
});