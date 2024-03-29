<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'فرهنگی',
            'slug' => $this->faker->slug(),
            'description' => $this->faker->realText(),
            'icon' => $this->faker->word(),
        ];
    }
}
