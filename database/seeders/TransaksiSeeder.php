<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    
        DB::table('transaksis')->insert([
            [
                'users_id'=>rand(1,2),
            ]
        ]);
    }
}
