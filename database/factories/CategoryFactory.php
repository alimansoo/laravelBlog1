<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PersianFaker\PersianFaker;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'=>$this->faker->slug(1),
            'name_fa'=>PersianFaker::get('City'),
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
