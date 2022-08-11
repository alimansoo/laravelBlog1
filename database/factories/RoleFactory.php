<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>'نویسنده',
            'permision'=>3,
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
