<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->sentence(1),
            'role' => 'user',
            'tabungan' => fake()->randomDigit,
            'penarikan' => fake()->randomDigit,
            'jk_user' => fake()->sentence(1),
            'kelas_user' => fake()->sentence(1),
            'tahun_akademik_user' => fake()->sentence(1),
            'bidang_user' => fake()->sentence(1),
        ];
    }
}
