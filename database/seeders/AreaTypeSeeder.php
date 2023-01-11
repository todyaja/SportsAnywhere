<?php

namespace Database\Seeders;

use App\Models\AreaType;
use Illuminate\Database\Seeder;

class AreaTypeSeeder extends Seeder
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
                'name' => 'Other'
            ],[
                'name' => 'Futsal',
            ],[
                'name' => 'Swimming Pool',
            ],[
                'name' => 'Yoga',
            ],[
                'name' => 'Gym',
            ],[
                'name' => 'Basketball',
            ],


        ])->each(function ($item){
            AreaType::create($item);
        });
    }
}
