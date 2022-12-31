<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $items = collect([
            [
                'created_by' => 4,
                'name' => 'Field 1',
                'area_type' => 1,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 2',
                'area_type' => 2,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr2.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 3',
                'area_type' => 3,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr3.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 4',
                'area_type' => 4,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr4.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 5',
                'area_type' => 5,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],   [
                'created_by' => 3,
                'name' => 'Field 1',
                'area_type' => 1,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 2',
                'area_type' => 2,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr2.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 3',
                'area_type' => 3,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr3.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 4',
                'area_type' => 4,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr4.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 5',
                'area_type' => 5,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],   [
                'created_by' => 3,
                'name' => 'Field 1',
                'area_type' => 1,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 2',
                'area_type' => 2,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr2.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 3',
                'area_type' => 3,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr3.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 4',
                'area_type' => 4,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr4.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 5',
                'area_type' => 5,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],   [
                'created_by' => 3,
                'name' => 'Field 1',
                'area_type' => 1,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 2',
                'area_type' => 2,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr2.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 3',
                'area_type' => 3,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr3.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 4',
                'area_type' => 4,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr4.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 5',
                'area_type' => 5,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],   [
                'created_by' => 3,
                'name' => 'Field 1',
                'area_type' => 1,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 2',
                'area_type' => 2,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr2.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 3',
                'area_type' => 3,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr3.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 4',
                'area_type' => 4,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr4.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 5',
                'area_type' => 5,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],   [
                'created_by' => 3,
                'name' => 'Field 1',
                'area_type' => 1,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 2',
                'area_type' => 2,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr2.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 3',
                'area_type' => 3,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr3.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 4',
                'area_type' => 4,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr4.jpg',
            ],[
                'created_by' => 3,
                'name' => 'Field 5',
                'area_type' => 5,
                'description' => $faker->text(),
                'price' => 25000,
                'address' => $faker->text(),
                'thumbnail' => 'kr1.jpg',
            ],


        ])->each(function ($item){
            Area::create($item);
        });
    }
}
