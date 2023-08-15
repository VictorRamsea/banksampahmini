<?php

namespace Database\Factories;

use App\Models\PenarikanModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenarikanFactory extends Factory
{
    protected $model = PenarikanModelFactory::class;

    public function definition()
    {
        return [
            'username_penarikan' => $this->faker->name,
            'fullname_penarikan' => $this->faker->name,
            'nominal_penarikan' => $this->faker->randomNumber,
            'jenis_penarikan' => $this->faker->sentence(1),
            'tanggal_penarikan' => $this->faker->date,
            'keterangan_penarikan' => $this->faker->sentence(1),
            'vue_penarikan' => $this->faker->randomNumber,
            'jenis_patty_tarik' => $this->faker->sentence(1),
        ];
    }
}