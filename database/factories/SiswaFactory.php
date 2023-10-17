<?php

namespace Database\Factories;
use App\Models\Siswa;
use Faker\Generator as Faker;
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
    public function definition(): array
    {
        return [
            'email' => $faker->unique()->safeEmail,
            'nama' => $faker->name,
            'password' => bcrypt('password'),
        ];
    }
}
