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
                // [
                //     'booking_id' => 1,
                //     'review' => $faker->text(),
                //     'rating' => 5
                // ],  [
                //     'booking_id' => 2,
                //     'review' => $faker->text(),
                //     'rating' => $faker->numberBetween(0, 5)
                // ],[
                //     'booking_id' => 3,
                //     'review' => $faker->text(),
                //     'rating' => $faker->numberBetween(0, 5)
                // ],[
                //     'booking_id' => 4,
                //     'review' => $faker->text(),
                //     'rating' => $faker->numberBetween(0, 5)
                // ]

            ])->each(function ($item) {
                AreaRating::create($item);
            });
    }
}
