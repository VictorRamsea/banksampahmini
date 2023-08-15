<?php

namespace Database\Factories;

use App\Models\KelasModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = KelasModelFactory::class;

    public function definition()
    {
        return [
            'kelas' => $this->faker->sentence(1),
            'jurusan_kelas' => $this->faker->sentence(1),
            'prodi_kelas' => $this->faker->sentence(1),
            'aktif_kelas' => 'aktif',
        ];
    }
}
