<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = collect([
                [
                    'area_id' => '1',
                    'guest_id' => 1,
                    'start_date' => '2022-12-29 10:35:10',
                    'end_date' => '2022-12-29 11:35:10',
                    'status' => 1,
                ],  [
                    'area_id' => '3',
                    'guest_id' => 2,
                    'start_date' => '2023-01-20 10:35:10',
                    'end_date' => '2023-01-20 11:35:10',
                     'status' => 0
                ],  [
                    'area_id' => '2',
                    'guest_id' => 1,
                    'start_date' => '2022-12-20 10:35:10',
                    'end_date' => '2022-12-20 11:35:10',
                    'status' => 0
                ],
            ])->each(function ($item) {
                Booking::create($item);
            });
    }
}
