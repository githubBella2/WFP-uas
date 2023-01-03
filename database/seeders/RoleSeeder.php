<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Pemilik', 'Pegawai', 'Pembeli'];
        foreach($arr as $c) {
            DB::table('roles')->insert([
                'nama'=>$c
            ]);
        }
    }
}
