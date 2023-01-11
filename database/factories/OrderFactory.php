<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "jumlah_pesanan" => mt_rand(1, 3),
            "grand_total" => mt_rand(10000, 300000),
            "total_pesanan" => mt_rand(10, 20),
            "status" => "Complete",
            "nama_pemesan" => $this->faker->firstName(),
            "employee_id" => mt_rand(1, 3),
        ];
    }
}