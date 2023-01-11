<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\item;
use App\Models\role;
use App\Models\order;
use App\Models\employee;
use App\Models\kategori;
use App\Models\keranjang;
use App\Models\detailOrder;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        employee::factory(5)->create();
        role::factory(5)->create();
        order::factory(5)->create();
        detailOrder::factory(5)->create();
        // item::factory(5)->create();

        $makanan = ["Bika Ambon", "Kue Klepon", "Kue Sagu", "Kue Nastar", "Kue Putri Salju", "Basreng Pedas Daun Jeruk"];
        $nettoMkn = [250, 200, 250, 250, 250, 100];
        $hargaMkn = [25000, 15000, 20000, 40000, 40000, 9000];
        $deskMkn = [
            "Bika Ambon terbuat dari tepung tapioka, telur, gula, dan santan.
",
            "Kue Klepon terbuat dari tepung beras, tepung kanji, gula, garam,  telur, kacang hijau, dan pewarna alami.
",
            "Kue Sagu terbuat dari bahan berkualitas dan pilihan seperti Butter pilihan yang di padukan dengan Keju Cheddar sehingga memiliki rasa yang Lumer namun Crunchy di mulut.",
            "Kue Kering Berkualitas, Menggunakan bahan-bahan premium, ketahanan hingga 2-4 bulan.",
            "Kue Putri Salju dibuat dari adonan tepung terigu, tepung maizena, mentega dan kuning telur yang dipanggang di dalam oven sampai matang dan di atasnya diselimuti dengan gula halus.
",
            "Basreng ini memakai bahan alami mulai dari cabai merah asli, daun jeruk, bawang dan rempah asli dari Indonesia.",
        ];
        $gambarMkn = [
            "images/makanan1.jpg",
            "images/makanan2.jpg",
            "images/makanan3.jpg",
            "images/makanan4.jpg",
            "images/makanan5.jpg",
            "images/makanan6.jpg",
        ];

        $minuman = ["Es Teh Manis", "Teh Tawar Hangat", "Es Jeruk"];
        $nettoMnm = [0, 0, 0];
        $hargaMnm = [7000, 5000, 9000];
        $deskMnm = [
            "Minuman yang terbuat dari larutan teh yang diberi gula tebu atau pemanis.",
            "Minuman yang terbuat dari larutan teh yang tidak diberi gula ataupun pemanis.
",
            "Minuman yang terbuat dari perasan buah jeruk asli.
",
        ];
        $gambarMnm = [
            "images/minuman1.jpeg",
            "images/minuman2.jpg",
            "images/minuman3.jpg",
        ];

        // Makanan
        for ($i = 0; $i < sizeof($makanan); $i++) {
            $data = [
                "nama" => $makanan[$i],
                "kategori_id" => 1,
                "netto" => $nettoMkn[$i],
                "gambar" => $gambarMkn[$i],
                "excerpt" => Str::limit($deskMkn[$i], 50),
                "deskripsi" => $deskMkn[$i],
                "harga" => $hargaMkn[$i]
            ];
            item::create($data);
        }

        // Minuman
        for ($i = 0; $i < sizeof($minuman); $i++) {
            $data = [
                "nama" => $minuman[$i],
                "kategori_id" => 2,
                "gambar" => $gambarMnm[$i],
                "netto" => $nettoMnm[$i],
                "excerpt" => Str::limit($deskMnm[$i], 50),
                "deskripsi" => $deskMnm[$i],
                "harga" => $hargaMnm[$i]
            ];
            item::create($data);
        }

        $dataUser = [
            "username" => "admin",
            "password" => "admin"
        ];

        User::create([
            'name' => 'Alvin Alyundyra', 'username' => 'Alvin', 'email' => 'alvin@gmail.com', 'password' => bcrypt('12345')
        ]);

        // kategori::factory(3)->create();
        keranjang::factory(3)->create();

        kategori::create(["nama_kategori" => "Makanan"]);
        kategori::create(["nama_kategori" => "Minuman"]);
    }
}