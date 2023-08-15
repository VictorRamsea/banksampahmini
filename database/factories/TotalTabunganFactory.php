<?php

namespace Database\Factories;

use App\Models\TotalTabunganModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TotalTabunganFactory extends Factory
{
    protected $model = TotalTabunganModelFactory::class;

    public function definition()
    {
        return [
            'username_tabungan' => $this->faker->name,
            'fullname_tabungan' => $this->faker->name,
            'nominal_tabungan' => $this->faker->randomNumber,
            'jenis_tabungan' => $this->faker->Str::random(10),
            'tanggal_tabungan' => $this->faker->date,
            'keterangan_tabungan' => $this->faker->Str::random(10),
            'vue_tabungan' => $this->faker->randomNumber,
            'tabungan_patty' => $this->faker->randomNumber,
        ];
    }
}