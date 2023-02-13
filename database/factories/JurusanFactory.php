<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jurusan>
 */
class JurusanFactory extends Factory
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
                'Rekayasa Perangkat Lunak', 'Teknik Komputer Jaringan', 'Sistem Informatika Jaringan Aplikasi', 'Teknik Kendaraan Ringan Otomotif', 'Multimedia', 'Teknik Pemesinan', 'Teknik Fabrikasi Logam Manufaktur', 'Teknik Otomasi Industri', 'Bisnis Konstruksi Properti', 'Desain Pemodelan Informasi Bangunan'
            ])
        ];
    }
}