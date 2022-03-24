<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Repository;
use App\Models\Project;
use App\Models\Subject;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'repository_id' => Repository::all()->count() ? Repository::all()->random()->id : null,
        'project_id' => Project::all()->count() ? Project::all()->random()->id : null
    ];
});
