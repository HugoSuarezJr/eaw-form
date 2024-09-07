<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'street_address' => fake()->streetAddress(),
            'country' => 'United States',
            'city' => fake('en_US')->city(),
            'region' => fake()->randomElement(['NY', 'FL', 'MA']),
            'postal_code' => fake()->postcode(),
            'heating_system' => fake()->randomElement(['hot water', 'steam']),
            'created_at' => time()
        ];
    }
}
