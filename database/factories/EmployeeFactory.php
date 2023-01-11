<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => $this->faker->username(),
            'password' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            'nama_lengkap' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber(),
            'jenis_kelamin' => "Laki-Laki",
        ];
    }
}

//   'judul' => $this->faker->sentence(mt_rand(2, 8)),
//             'slug' => $this->faker->slug(),
//             'excerpt' => $this->faker->paragraph(),
//             // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',
//             'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function ($p) {
//                 return "<p>$p</p>";
//             })->implode(''),
//             'user_id' => mt_rand(1, 3),
//             'category_id' => mt_rand(1, 3)