<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Borrower;
use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Borrower::class, function (Faker $faker) {
    return [
        'step' => $faker->randomDigit,
        'steps' => json_encode([$faker->randomDigit, $faker->randomDigit, $faker->randomDigit, $faker->randomDigit, $faker->randomDigit]),
        'monthly_sales' => $faker->randomFloat(2, 100, 1000),
        'monthly_expenses' => $faker->randomFloat(2, 10, 100),
        'legal_business_name' => $faker->company,
        'business_physical_address' => $faker->streetAddress,
        'business_physical_city' => $faker->city,
        'business_physical_province' => 'ON',
        'business_physical_postal' => $faker->postcode,
        'email' => $faker->companyEmail,
        'dob' => $faker->date('Y-m-d')
    ];
});
