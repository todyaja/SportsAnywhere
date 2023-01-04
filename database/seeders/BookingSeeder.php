<?php

namespace Database\Seeders;

use DateTime;
use Carbon\Carbon;
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
                    'start_date' => Carbon::yesterday(),
                    'end_date' => Carbon::yesterday()->addHour(),
                    'cancelled' => 0,
                ],  [
                    'area_id' => '4',
                    'guest_id' => 2,
                    'start_date' => Carbon::yesterday(),
                    'end_date' => Carbon::yesterday()->addHour(),
                    'cancelled' => 0,
                ],  [
                    'area_id' => '3',
                    'guest_id' => 2,
                    'start_date' => Carbon::now()->addMonth(),
                    'end_date' => Carbon::now()->addMonth()->addHour(),
                     'cancelled' => 0
                ],  [
                    'area_id' => '2',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday()->addHour(),
                    'end_date' => Carbon::yesterday()->addHours('2'),
                    'cancelled' => 0
                ], [
                    'area_id' => '2',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7')->addHour(),
                    'end_date' => Carbon::tomorrow('GMT+7'),
                    'cancelled' => 0
                ], [
                    'area_id' => '1',
                    'guest_id' => 1,
                    'start_date' => DateTime::createFromFormat('Y-m-d H:i:s', '2023-01-04 10:00:00')->format('Y-m-d H:i:s'),
                    'end_date' => DateTime::createFromFormat('Y-m-d H:i:s', '2023-01-04 11:00:00')->format('Y-m-d H:i:s'),
                    'cancelled' => 0
                ], [
                    'area_id' => '1',
                    'guest_id' => 2,
                    'start_date' => DateTime::createFromFormat('Y-m-d H:i:s', '2023-01-04 13:00:00')->format('Y-m-d H:i:s'),
                    'end_date' => DateTime::createFromFormat('Y-m-d H:i:s', '2023-01-04 16:00:00')->format('Y-m-d H:i:s'),
                    'cancelled' => 0
                ],
            ])->each(function ($item) {
                Booking::create($item);
            });
    }
}
