<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // User::factory(100)->create();

        //creem administratorul sitului
        $user=new User;

        $user->name='Administrator';
        $user->email='admin@gmail.com';
        $user->phone='0774 54378 543';
        $user->role='admin';
        $user->password=bcrypt('password');
        $user->remember_token = Str::random(10);

        $user->save();



    }
}
