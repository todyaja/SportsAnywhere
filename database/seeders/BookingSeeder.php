<?php

namespace Database\Seeders;

use App\Models\Booking;
use Carbon\Carbon;
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
                    'status' => 1,
                ],  [
                    'area_id' => '4',
                    'guest_id' => 2,
                    'start_date' => Carbon::yesterday(),
                    'end_date' => Carbon::yesterday()->addHour(),
                    'status' => 1,
                ],  [
                    'area_id' => '3',
                    'guest_id' => 2,
                    'start_date' => Carbon::now()->addMonth(),
                    'end_date' => Carbon::now()->addMonth()->addHour(),
                     'status' => 0
                ],  [
                    'area_id' => '2',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday()->addHour(),
                    'end_date' => Carbon::yesterday()->addHours('2'),
                    'status' => 0
                ], [
                    'area_id' => '2',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7')->addHour(),
                    'end_date' => Carbon::tomorrow('GMT+7'),
                    'status' => 0
                ],
            ])->each(function ($item) {
                Booking::create($item);
            });
    }
}
