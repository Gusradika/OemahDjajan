<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detailOrder>
 */
class DetailOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "order_id" => mt_rand(1, 3),
            "item_id" => mt_rand(1, 3),
            "kuantitas" => mt_rand(1, 3),
            "total" => mt_rand(1000, 30000),
        ];
    }
}