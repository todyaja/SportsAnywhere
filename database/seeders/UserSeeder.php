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
                'profile_picture' => 'guest.jpg',
                'phone_number' => '08118423004',
                'role' => 0
            ],  [
                'email' => 'user2@gmail.com',
                'username' => 'user2@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'guest.jpg',
                'phone_number' => '08118423004',
                'role' => 0
            ],  [
                'email' => 'host1@gmail.com',
                'username' => 'host1@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'guest.jpg',
                'phone_number' => '08118423004',
                'role' => 1
            ],
            [
                'email' => 'host2@gmail.com',
                'username' => 'host2@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'guest.jpg',
                'phone_number' => '08118423004',
                'role' => 1
            ], [
                'email' => 'admin@gmail.com',
                'username' => 'host2@gmail.com',
                'password' => bcrypt('password'),
                'profile_picture' => 'guest.jpg',
                'phone_number' => '08118423004',
                'role' => 2
            ],


        ])->each(function ($item) {
            User::create($item);
        });
    }
}
