<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
       'product_code' => $this->faker->product_code,
       'product_name' => $this->faker->product_name,
       'category' => $this->faker->category,
       'quantity' => $this->faker->quantity,
       'selling_price' => $this->faker->selling_price,
    ];
});
