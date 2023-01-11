<?php

namespace Database\Seeders;

use App\Models\AreaPicture;
use Illuminate\Database\Seeder;

class AreaPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = collect([
            [
                'pictures' => 'zeta1.jpg',
                'area_id' => 1,
            ],  [
                'pictures' => 'zeta2.jpg',
                'area_id' => 1,
            ],  [
                'pictures' => 'zeta3.jpg',
                'area_id' => 1,
            ],

            [
                'pictures' => 'petamburan1.jpg',
                'area_id' => 2,
            ],  [
                'pictures' => 'petamburan2.jpg',
                'area_id' => 2,
            ],  [
                'pictures' => 'petamburan3.jpg',
                'area_id' => 2,
            ],

            [
                'pictures' => 'patra1.jpg',
                'area_id' => 3,
            ],  [
                'pictures' => 'patra2.jpg',
                'area_id' => 3,
            ],  [
                'pictures' => 'patra3.jpg',
                'area_id' => 3,
            ],

            [
                'pictures' => 'myfutsal1.jpg',
                'area_id' => 4,
            ],  [
                'pictures' => 'myfutsal2.jpg',
                'area_id' => 4,
            ],  [
                'pictures' => 'myfutsal3.jpg',
                'area_id' => 4,
            ],

            [
                'pictures' => 'goall1.jpg',
                'area_id' => 5,
            ],  [
                'pictures' => 'goall2.jpg',
                'area_id' => 5,
            ],  [
                'pictures' => 'goall3.png',
                'area_id' => 5,
            ],

            [
                'pictures' => 'elang1.jpg',
                'area_id' => 6,
            ],  [
                'pictures' => 'elang2.jpg',
                'area_id' => 6,
            ],  [
                'pictures' => 'elang3.jpg',
                'area_id' => 6,
            ],

            [
                'pictures' => 'homypool1.jpeg',
                'area_id' => 7,
            ],  [
                'pictures' => 'homypool2.jpg',
                'area_id' => 7,
            ],  [
                'pictures' => 'homypool3.jpg',
                'area_id' => 7,
            ],

            [
                'pictures' => 'gorpool1.jpeg',
                'area_id' => 8,
            ],  [
                'pictures' => 'gorpool2.jpeg',
                'area_id' => 8,
            ],  [
                'pictures' => 'gorpool3.jpeg',
                'area_id' => 8,
            ],

            [
                'pictures' => 'cikinipool1.jpg',
                'area_id' => 9,
            ],  [
                'pictures' => 'cikinipool2.jpg',
                'area_id' => 9,
            ],  [
                'pictures' => 'cikinipool3.jpg',
                'area_id' => 9,
            ],

            [
                'pictures' => 'laca1.jpg',
                'area_id' => 10,
            ],  [
                'pictures' => 'laca2.jpg',
                'area_id' => 10,
            ],  [
                'pictures' => 'laca3.jpg',
                'area_id' => 10,
            ],

            [
                'pictures' => 'sana1.jpg',
                'area_id' => 11,
            ],  [
                'pictures' => 'sana2.jpg',
                'area_id' => 11,
            ],  [
                'pictures' => 'sana3.jpg',
                'area_id' => 11,
            ],

            [
                'pictures' => 'zuci1.jpg',
                'area_id' => 12,
            ],  [
                'pictures' => 'zuci2.jpg',
                'area_id' => 12,
            ],  [
                'pictures' => 'zuci3.jpg',
                'area_id' => 12,
            ],

            [
                'pictures' => 'emporium1.jpg',
                'area_id' => 13,
            ],  [
                'pictures' => 'emporium2.jpg',
                'area_id' => 13,
            ],  [
                'pictures' => 'emporium3.jpg',
                'area_id' => 13,
            ],

            [
                'pictures' => 'manggala1.jpg',
                'area_id' => 14,
            ],  [
                'pictures' => 'manggala2.jpg',
                'area_id' => 14,
            ],  [
                'pictures' => 'manggala3.jpg',
                'area_id' => 14,
            ],

            [
                'pictures' => 'maxima1.jpg',
                'area_id' => 15,
            ],  [
                'pictures' => 'maxima2.jpg',
                'area_id' => 15,
            ],  [
                'pictures' => 'maxima3.jpg',
                'area_id' => 15,
            ],

            [
                'pictures' => 'brickhouse1.jpg',
                'area_id' => 16,
            ],  [
                'pictures' => 'brickhouse2.jpg',
                'area_id' => 16,
            ],  [
                'pictures' => 'brickhouse3.jpg',
                'area_id' => 16,
            ],

            [
                'pictures' => 'senayan1.jpeg',
                'area_id' => 17,
            ],  [
                'pictures' => 'senayan2.jpg',
                'area_id' => 17,
            ],  [
                'pictures' => 'senayan3.jpg',
                'area_id' => 17,
            ],

            [
                'pictures' => 'flex1.jpg',
                'area_id' => 18,
            ],  [
                'pictures' => 'flex2.png',
                'area_id' => 18,
            ],  [
                'pictures' => 'flex3.jpg',
                'area_id' => 18,
            ],


        ])->each(function ($item) {
            AreaPicture::create($item);
        });
    }
}
