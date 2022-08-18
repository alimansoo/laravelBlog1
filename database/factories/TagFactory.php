<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PersianFaker\PersianFaker;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => PersianFaker::get('City'),
            'slug' => $this->faker->slug(2)
        ];
    }
}
