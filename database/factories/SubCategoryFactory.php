<?php

namespace Database\Factories;

// use App\Category;
// use App\SubCategory;
// use Illuminate\Database\Eloquent\Factories\Factory;

// class SubCategoryFactory extends Factory
// {
//     protected $model = SubCategory::class;

//     public function definition()
//     {
//         return [
//             'name' => $this->faker->sentence(),
//             'category_id' => factory(Category::class),
//         ];
//     }
// }

use App\Category;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'category_id' => factory(App\Category::class),
        
    ];
});