<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->word,
        'condition' => $faker->randomElement([true,false]),
        'question_id' => function(){
            return App\Question::all()->random() ;
        }
    ];
});
