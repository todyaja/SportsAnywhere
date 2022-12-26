<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'email' => 'Test',
                'username' => 'Test',
                'password' => 'Test',
                'profile_picture' => 'Test',
                'phone_number' => 'Test',
            ],


        ])->each(function ($item){
            User::create($item);
        });
    }
}
