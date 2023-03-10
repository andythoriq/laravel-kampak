<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => fake()->unique()->numberBetween(1000000, 9999999) . 69,
            'nama' => ucwords(fake()->firstName() . ' ' . fake()->lastName()),
            'jk' => fake()->randomElement(['L', 'P']),
            'alamat' => fake()->address(),
            'password' => '123'
        ];
    }
}