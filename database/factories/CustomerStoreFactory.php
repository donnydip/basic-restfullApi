<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Mr', 'Mrs']),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'phone_number' => fake()->phoneNumber(),
            'image' => fake()->url('http'),
            'email' => fake()->email(),
        ];
    }
}
