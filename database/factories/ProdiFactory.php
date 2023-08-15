<?php

namespace Database\Factories;

use App\Models\ProdiModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdiFactory extends Factory
{
    protected $model = ProdiModelFactory::class;

    public function definition()
    {
        return [
            'prodi' => $this->faker->sentence(1),
        ];
    }
}
