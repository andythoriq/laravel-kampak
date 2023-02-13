<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $classCount = Kelas::count();
        return [
            'nis' => fake()->unique()->numberBetween(1000000, 9999999) . 666,
            'nama' => ucwords(fake()->firstName() . ' ' . fake()->lastName()),
            'jk' => fake()->randomElement(['L', 'P']),
            'alamat' => fake()->address(),
            'kelas_id' => fake()->numberBetween(1, $classCount),
            'password' => '123'
        ];
    }
}