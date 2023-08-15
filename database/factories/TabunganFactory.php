<?php

namespace Database\Factories;

use App\Models\TabunganModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TabunganFactory extends Factory
{
    protected $model = TabunganModelFactory::class;

    public function definition()
    {
        return [
            'username_tabungan' => $this->faker->name,
            'fullname_tabungan' => $this->faker->name,
            'nominal_tabungan' => $this->faker->randomNumber,
            'jenis_penabung' => $this->faker->sentence(1),
            'tanggal_tabungan' => $this->faker->date,
            'keterangan_tabungan' => $this->faker->sentence(1),
            'vue_tabungan' => $this->faker->randomNumber,
        ];
    }
}