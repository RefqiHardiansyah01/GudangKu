<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition()
    {
        return [
            'user_id'   => 1,
            'nama'      => $this->faker->word(),
            'stok'      => rand(1, 50),
            'deskripsi' => $this->faker->sentence(),
        ];
    }
}

