<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Question;
use App\Model\Reply;
use App\User;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'question_id' => function () {
            // return factory(Question::class)->create()->id;
            return Question::all()->rand();
        },
        'user_id' => function () {
            // return factory(User::class)->create()->id;
            return User::all()->rand();
        }
    ];
});
