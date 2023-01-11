<?php

namespace Database\Seeders;

use App\Models\AreaRating;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AreaTypeSeeder::class,
        ]);
        $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            AreaSeeder::class,
        ]);
        $this->call([
            AreaPictureSeeder::class,
        ]);
        $this->call([
            BookingSeeder::class,
        ]);
        $this->call([
            AreaRatingSeeder::class,
        ]);

    }
}
