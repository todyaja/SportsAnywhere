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

            // ----------------------------------------------- USER 1 -------------------------------------------------------------------------

                //ongoing
                [
                    'area_id' => '1',
                    'guest_id' => 1,
                    'start_date' => Carbon::now('GMT+7')->startOfDay()->addHour('9'),
                    'end_date' => Carbon::now('GMT+7')->startOfDay()->addHour('14'),
                    'cancelled' => 0,
                ],
                [
                    'area_id' => '2',
                    'guest_id' => 1,
                    'start_date' => Carbon::now('GMT+7')->startOfDay()->addHour('15'),
                    'end_date' => Carbon::now('GMT+7')->startOfDay()->addHour('18'),
                    'cancelled' => 0
                ],
                [
                    'area_id' => '3',
                    'guest_id' => 1,
                    'start_date' => Carbon::now('GMT+7')->startOfDay()->addHour('9'),
                    'end_date' => Carbon::now('GMT+7')->startOfDay()->addHour('18'),
                    'cancelled' => 0
                ],

                //upcoming
                [
                    'area_id' => '4',
                    'guest_id' => 1,
                    'start_date' => Carbon::tomorrow('GMT+7')->addHour('9'),
                    'end_date' => Carbon::tomorrow('GMT+7')->addHour('11'),
                    'cancelled' => 0
                ],
                [
                    'area_id' => '5',
                    'guest_id' => 1,
                    'start_date' => Carbon::tomorrow('GMT+7')->addHour('12'),
                    'end_date' => Carbon::tomorrow('GMT+7')->addHour('14'),
                    'cancelled' => 0
                ],
                [
                    'area_id' => '6',
                    'guest_id' => 1,
                    'start_date' => Carbon::tomorrow('GMT+7')->addHour('15'),
                    'end_date' => Carbon::tomorrow('GMT+7')->addHour('17'),
                    'cancelled' => 0
                ],

                //completed
                [
                    'area_id' => '7',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7'),
                    'end_date' => Carbon::yesterday('GMT+7')->addHour('2'),
                    'cancelled' => 0
                ],
                [
                    'area_id' => '8',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7')->addHour('3'),
                    'end_date' => Carbon::yesterday('GMT+7')->addHour('5'),
                    'cancelled' => 0
                ],
                [
                    'area_id' => '9',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7')->addHour('6'),
                    'end_date' => Carbon::yesterday('GMT+7')->addHour('8'),
                    'cancelled' => 0
                ],


                //canceled
                [
                    'area_id' => '7',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7'),
                    'end_date' => Carbon::yesterday('GMT+7')->addHour('2'),
                    'cancelled' => 1
                ],
                [
                    'area_id' => '8',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7')->addHour('3'),
                    'end_date' => Carbon::yesterday('GMT+7')->addHour('5'),
                    'cancelled' => 1
                ],
                [
                    'area_id' => '9',
                    'guest_id' => 1,
                    'start_date' => Carbon::yesterday('GMT+7')->addHour('6'),
                    'end_date' => Carbon::yesterday('GMT+7')->addHour('8'),
                    'cancelled' => 1
                ],

             // ----------------------------------------------- USER 2 -------------------------------------------------------------------------
             //ongoing
             [
                'area_id' => '10',
                'guest_id' => 2,
                'start_date' => Carbon::now('GMT+7')->startOfDay()->addHour('9'),
                'end_date' => Carbon::now('GMT+7')->startOfDay()->addHour('14'),
                'cancelled' => 0,
            ],
            [
                'area_id' => '11',
                'guest_id' => 2,
                'start_date' => Carbon::now('GMT+7')->startOfDay()->addHour('15'),
                'end_date' => Carbon::now('GMT+7')->startOfDay()->addHour('18'),
                'cancelled' => 0
            ],
            [
                'area_id' => '12',
                'guest_id' => 2,
                'start_date' => Carbon::now('GMT+7')->startOfDay()->addHour('9'),
                'end_date' => Carbon::now('GMT+7')->startOfDay()->addHour('18'),
                'cancelled' => 0
            ],

            //upcoming
            [
                'area_id' => '13',
                'guest_id' => 2,
                'start_date' => Carbon::tomorrow('GMT+7')->addHour('9'),
                'end_date' => Carbon::tomorrow('GMT+7')->addHour('11'),
                'cancelled' => 0
            ],
            [
                'area_id' => '14',
                'guest_id' => 2,
                'start_date' => Carbon::tomorrow('GMT+7')->addHour('12'),
                'end_date' => Carbon::tomorrow('GMT+7')->addHour('14'),
                'cancelled' => 0
            ],
            [
                'area_id' => '15',
                'guest_id' => 2,
                'start_date' => Carbon::tomorrow('GMT+7')->addHour('15'),
                'end_date' => Carbon::tomorrow('GMT+7')->addHour('17'),
                'cancelled' => 0
            ],

            //completed
            [
                'area_id' => '1',
                'guest_id' => 2,
                'start_date' => Carbon::yesterday('GMT+7'),
                'end_date' => Carbon::yesterday('GMT+7')->addHour('2'),
                'cancelled' => 0
            ],
            [
                'area_id' => '2',
                'guest_id' => 2,
                'start_date' => Carbon::yesterday('GMT+7')->addHour('3'),
                'end_date' => Carbon::yesterday('GMT+7')->addHour('5'),
                'cancelled' => 0
            ],
            [
                'area_id' => '3',
                'guest_id' => 2,
                'start_date' => Carbon::yesterday('GMT+7')->addHour('6'),
                'end_date' => Carbon::yesterday('GMT+7')->addHour('8'),
                'cancelled' => 0
            ],


            //canceled
            [
                'area_id' => '4',
                'guest_id' => 2,
                'start_date' => Carbon::yesterday('GMT+7'),
                'end_date' => Carbon::yesterday('GMT+7')->addHour('2'),
                'cancelled' => 1
            ],
            [
                'area_id' => '5',
                'guest_id' => 2,
                'start_date' => Carbon::yesterday('GMT+7')->addHour('3'),
                'end_date' => Carbon::yesterday('GMT+7')->addHour('5'),
                'cancelled' => 1
            ],
            [
                'area_id' => '6',
                'guest_id' => 2,
                'start_date' => Carbon::yesterday('GMT+7')->addHour('6'),
                'end_date' => Carbon::yesterday('GMT+7')->addHour('8'),
                'cancelled' => 1
            ],

            ])->each(function ($item) {
                Booking::create($item);
            });
    }
}
