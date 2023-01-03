<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arr = ['PT. YA', 'PT. MIMI', 'UD. QIU', 'PT. SALAM', 'UD. WAKWAW', 'PT. JAYA', 'UD. PIKMI', 'WISMI Inc.'];
        foreach($arr as $c) {
            DB::table('suppliers')->insert([
                'nama'=>$c
            ]);
        }
    }
}
