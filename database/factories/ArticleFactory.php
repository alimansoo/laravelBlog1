<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;
use PersianFaker\PersianFaker;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>PersianFaker::get('Lorem',['words'=>10]),
            'slug'=>$this->faker->slug(2),
            'category_id'=>rand(1,3),
            'body'=>PersianFaker::get('Lorem',['words'=>100]),
            'created_at'=>now(),
            'updated_at'=>now(),
            'view'=>0
        ];
    }
}
