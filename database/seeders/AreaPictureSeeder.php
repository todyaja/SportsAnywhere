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
                'pictures' => 'kr1.jpg',
                'area_id' => 1,
            ],  [
                'pictures' => 'kr2.jpg',
                'area_id' => 1,
            ],  [
                'pictures' => 'kr3.jpg',
                'area_id' => 1,
            ],  [
                'pictures' => 'kr4.jpg',
                'area_id' => 1,
            ],


        ])->each(function ($item) {
            AreaPicture::create($item);
        });
    }
}
