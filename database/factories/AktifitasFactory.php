<?php

namespace Database\Factories;

use App\Models\AktifitasModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AktifitasFactory extends Factory
{
    protected $model = AktifitasModelFactory::class;

    public function definition()
    {
        return [
            'nama_admin_aktifitas' => $this->faker->name,
            'nama_pengguna_aktifitas' => $this->faker->name,
            'kegiatan_aktifitas' => $this->faker->sentence(1),
            'nominal_aktifitas' => $this->faker->randomNumber,
            'tanggal_aktifitas' => $this->faker->date,
            'penerima_aktifitas' => $this->faker->name,
            'transfer_aktifitas' => $this->faker->sentence(1),
            'imbuhan_aktifitas' => $this->faker->sentence(1),
        ];
    }
}