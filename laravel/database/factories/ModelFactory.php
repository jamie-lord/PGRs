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

$faker = Faker\Factory::create();

$factory->defineAs(App\User::class, 'Student', function ($faker) {
    return [
    'title' => $faker->title,
    'first_name' => $faker->firstName,
    'middle_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'email' => $faker->unique()->email,
    'personal_email' => $faker->email,
    'personal_phone' => $faker->phoneNumber,
    'password' => bcrypt('password'),
    ];
});

$factory->defineAs(App\User::class, 'Staff', function ($faker) {
    return [
    'title' => $faker->title,
    'first_name' => $faker->firstName,
    'middle_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'email' => $faker->unique()->email,
    'personal_email' => $faker->email,
    'personal_phone' => $faker->phoneNumber,
    'password' => bcrypt('password'),
    ];
});

$factory->define(App\Student::class, function ($faker) {
    return [
    'dob' => $faker->date,
    'enrolment' => strtoupper($faker->unique()->bothify('???########')),
    'ukba_status_id' => $faker->numberBetween($min = 1, $max = 4),
    'award_id' => $faker->numberBetween($min = 1, $max = 3),
    'mode_of_study_id' => $faker->numberBetween($min = 1, $max = 2),
    'enrolment_status_id' => $faker->numberBetween($min = 1, $max = 4),
    'funding_type_id' => $faker->numberBetween($min = 1, $max = 5),
    'course_id' => 1,
    'home_address' => $faker->address,
    'current_address' => $faker->address,
    'gender' => randomGender(),
    'nationality' => $faker->country,
    'start' => date('Y-m-d', strtotime(Date("Y-m-d"). ' - '.$faker->numberBetween($min = 30, $max = 1460).' days')),
    ];
});

$factory->define(App\Staff::class, function ($faker) {
    return [
    'university_phone' => $faker->phoneNumber,
    'about' => $faker->paragraph($nbSentences = 5),
    'room' => $faker->numberBetween($min = 1000, $max = 2999),
    ];
});

$factory->define(App\Supervisor::class, function ($faker) {
    $daysAgo = $faker->numberBetween($min = 60, $max = 2190);
    $start = date('Y-m-d', strtotime(Date("Y-m-d"). ' - '.$daysAgo.' days'));
    $end = randomEndDate($start, $daysAgo, $faker);

    return [
    'student_id' => $faker->unique()->numberBetween($min = 1, $max = 100),
    'staff_id' => $faker->numberBetween($min = 1, $max = 20),
    'order' => 1,
    'start' => $start,
    'end' => $end,
    ];
});

function randomEndDate($start, $daysAgo, $faker){
    $seed = Rand (1,2);
    if ($seed == 1) {
        return NULL;
    }
    elseif ($seed == 2) {
        return date('Y-m-d', strtotime($start. ' + '.$faker->numberBetween($min = 1, $max = $daysAgo - 1).' days'));
    }
}

function randomGender() {
    $seed = Rand (1,2);
    if ($seed == 1) {
        return 'Male';
    }
    elseif ($seed == 2) {
        return 'Female';
    }
}