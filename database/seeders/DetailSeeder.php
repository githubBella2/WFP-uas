<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('details')->insert([
            [
                'transaksis_id'=>1,
                'obats_id'=>rand(1,6),
                'jumlah'=>rand(1,100),
                'harga'=>rand(1500 , 50000)
            ]
        ]);
    }
}
