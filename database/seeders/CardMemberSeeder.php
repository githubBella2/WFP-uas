<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CardMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('card_members')->insert([
            //1
            [
                'point' => 150,
                'date_start' => '2022-12-14'
            ],
            ]);
    }
}
