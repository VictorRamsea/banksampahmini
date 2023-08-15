<?php

namespace Database\Factories;

use App\Models\PattyCashModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PattyFactory extends Factory
{
    protected $model = PattyCashModelFactory::class;

    public function definition()
    {
        return [
            'jenis_patty' => $this->faker->sentence(1),
            'nominal_patty' => $this->faker->randomNumber,
        ];
    }
}