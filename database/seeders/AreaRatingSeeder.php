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
                    'area_id' => '1',
                    'guest_id' => 1,
                    'review' => $faker->text(),
                    'rating' => $faker->numberBetween(0, 5)
                ],  [
                    'area_id' => '1',
                    'guest_id' => 2,
                    'review' => $faker->text(),
                    'rating' => $faker->numberBetween(0, 5)
                ],[
                    'area_id' => '1',
                    'guest_id' => 1,
                    'review' => $faker->text(),
                    'rating' => $faker->numberBetween(0, 5)
                ],[
                    'area_id' => '2',
                    'guest_id' => 2,
                    'review' => $faker->text(),
                    'rating' => $faker->numberBetween(0, 5)
                ],  [
                    'area_id' => '3',
                    'guest_id' => 1,
                    'review' => $faker->text(),
                    'rating' => $faker->numberBetween(0, 5)
                ],
                [
                    'area_id' => '4',
                    'guest_id' => 1,
                    'review' => $faker->text(),
                    'rating' => 4
                ],
                [
                    'area_id' => '4',
                    'guest_id' => 1,
                    'review' => $faker->text(),
                    'rating' => 5
                ],

            ])->each(function ($item) {
                AreaRating::create($item);
            });
    }
}
