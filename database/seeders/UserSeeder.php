<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            [
                'name'=> 'Ega',
                'email' => 'ega@gmail.com',
                'password'=>'$2y$10$Yf8ZVh34Wm6iMG5gGXThmuqipqUE8myHqA/a2acEQZ728Ftgcqw6W',
                'roles_id'=>rand(1,3),
                'members_id'=>1
            ],
            [
                'name'=> 'joni',
                'email' => 'joni@gmail.com',
                'password'=>'$2y$10$lDdriZkViK7dZ.x.4DOt7eV4H5OD50WnHc1MNqrz.7seawF8.jNfO',
                'roles_id'=>rand(1,3),
                'members_id'=>2
            ]
        ]);
    }
}
