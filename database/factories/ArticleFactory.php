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
            'category'=>rand(1,5),
            'body'=>PersianFaker::get('Lorem',['words'=>100]),
            'writerId'=>rand(1,3),
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
