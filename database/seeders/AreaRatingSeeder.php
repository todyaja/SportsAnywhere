<?php

namespace Database\Seeders;

use App\Models\AreaRating;
use Illuminate\Database\Seeder;

class AreaRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $items = collect([
                [
                    'booking_id' => 7,
                    'review' => 'Lingkungannya bersih, tempatnya sepi. Cocok buat yang pingin peace and quiet :)',
                    'rating' => 5
                ],
                [
                    'booking_id' => 9,
                    'review' => 'Airnya kurang bersih, tepi kolam agak berlumut, tapi sisanya udah oke',
                    'rating' => 4
                ],
                [
                    'booking_id' => 19,
                    'review' => 'Lapangannya oke, tapi agak tricky kalo dari luar karena di pojok dan agak gelap dan belum ada fasilitas untuk ganti senar.',
                    'rating' => 4
                ],[
                    'booking_id' => 21,
                    'review' => 'Lapangannya dikelilingi pohon, jadi suasana lebih adem dan asri. Kamar mandi kurang bersih.',
                    'rating' => 4
                ]

            ])->each(function ($item) {
                AreaRating::create($item);
            });
    }
}
