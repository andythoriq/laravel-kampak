<?php

namespace Database\Factories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subjectIds = Jurusan::getAllColumn('id',true);
        return [
            'nama' => '12',
            'jurusan_id' => fake()->unique()->randomElement($subjectIds)
        ];
    }
}