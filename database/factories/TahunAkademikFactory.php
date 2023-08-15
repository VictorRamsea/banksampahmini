<?php

namespace Database\Factories;

use App\Models\TahunAkademikModelFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TahunAkademikFactory extends Factory
{
    protected $model = TahunAkademikModelFactory::class;

    public function definition()
    {
        return [
            'tanggal_awal' => fake()->date(),
            'tanggal_akhir' => fake()->date(),
        ];
    }
}
