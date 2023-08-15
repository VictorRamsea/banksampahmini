<?php

namespace Database\Factories;

use App\Models\TahunAkademikModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TahunAkademikFactory extends Factory
{
    protected $model = TahunAkademikModel::class;

    public function definition()
    {
        return [
            'tanggal_awal' => $this->faker->date,
            'tanggal_awal' => $this->faker->date,
        ];
    }
}

// Menghasilkan tanggal acak:
$randomDate = $faker->date;

// Menghasilkan angka acak:
$randomNumber = $faker->randomNumber;

// Menghasilkan kalimat palsu:
$sentence = $faker->sentence;


// Menghasilkan alamat email palsu:
$email = $faker->email;

// Menghasilkan nama palsu:
$name = $faker->name;















