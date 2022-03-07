<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'path' => '/img/products/',
            'path' => '',
            'name' => $this->faker->unique()->imageUrl
        ];
    }
}
