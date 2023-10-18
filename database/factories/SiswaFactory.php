<?php

namespace Database\Factories;
use App\Models\Siswa;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
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
    protected $model = Siswa::class;
    public function definition(): array
    {
        return [
            'email' =>  $this->faker->unique()->safeEmail,
            'nama' =>  $this->faker->name,
            'password' => bcrypt('password'),
        ];
    }
}
