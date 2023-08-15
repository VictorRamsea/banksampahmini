<?php

namespace Database\Factories;

use App\Models\TransaksiModelFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    protected $model = TransaksiModelFactory::class;

    public function definition()
    {
        return [
            'username_transaksi' => $this->faker->name,
            'fullname_transaksi' => $this->faker->name,
            'tabungan_transaksi' => $this->faker->randomNumber,
            'penarikan_transaksi' => $this->faker->randomNumber,
            'jenis_transaksi' => $this->faker->sentence(1),
            'tanggal_transaksi' => $this->faker->date,
            'keterangan_transaksi' => $this->faker->sentence(1),
            'warna_transaksi' => $this->faker->sentence(1),
            'transfer_transaksi' => $this->faker->randomNumber,
            'kategori_transaksi' => $this->faker->sentence(1),
            'rekening_transaksi' => $this->faker->randomNumber,
            'petugas_transaksi' => $this->faker->sentence(1),
            'imbuhan_transaksi' => $this->faker->sentence(1),
        ];
    }
}