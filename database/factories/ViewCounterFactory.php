<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ViewCounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'month' => rand(1,12),
            'view' => rand(10,150)
        ];
    }
}
