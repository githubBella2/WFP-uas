<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr = ['SILVER', 'GOLD', 'PLATINUM'];
        foreach($arr as $c) {
            DB::table('members')->insert([
                'status'=>$c
            ]);
        }
    }
}
