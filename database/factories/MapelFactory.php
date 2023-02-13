<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mapel>
 */
class MapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->unique()->randomElement([
                'Matematika', 'Fisika', 'Kimia', 'Biologi', 'Geografi', 'Seni Rupa', 'Sastra', 'Ekonometrika',
                'Sosiologi', 'Ekonomi', 'Ilmu Politik', 'Pemrograman Dasar', 'Statistik', 'Perpajakan',
                'Jaringan Dasar', 'Bahasa Inggris', 'Sejarah', 'Pemrograman Berorientasi Object'
            ])
        ];
    }
}