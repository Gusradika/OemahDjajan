<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            "kategori_id" => mt_rand(1, 2),
            "nama" => $this->faker->firstName(),
            "netto" => mt_rand(200, 500),
            "deskripsi" => $this->faker->sentence(30),
            "excerpt" => Str::limit($this->faker->sentence(10), 60) . "...",
            "gambar" => null,
            "harga" => mt_rand(10000, 30000)
        ];
    }
}