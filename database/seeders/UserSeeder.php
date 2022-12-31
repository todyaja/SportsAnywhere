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
                'email' => 'user1@gmail.com',
                'username' => 'user1@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'Test',
                'phone_number' => 'Test',
                'role' => 0
            ],  [
                'email' => 'user2@gmail.com',
                'username' => 'user2@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'Test',
                'phone_number' => 'Test',
                'role' => 0
            ],  [
                'email' => 'host1@gmail.com',
                'username' => 'host1@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'Test',
                'phone_number' => 'Test',
                'role' => 1
            ],
            [
                'email' => 'host2@gmail.com',
                'username' => 'host2@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'Test',
                'phone_number' => 'Test',
                'role' => 1
            ],


        ])->each(function ($item){
            User::create($item);
        });
    }
}
