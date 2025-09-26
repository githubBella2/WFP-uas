<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obats')->insert([
            //1
            [
                'nama' => 'fentanil',
                'description' => 'Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.',
                'form' => "patch 25 mcg/jam",
                'restriction' => "10 patch/bulan",
                'harga' => rand(10000, 100000),
                'kategoris_id' => "1",
                'suppliers_id' => rand(1, 7)
            ],

            [
                'nama' => 'hidromorfon',
                'description' => '-',
                'form' => "tab lepas lambat 16 mg ",
                'restriction' => "30 tab/bulan",
                'harga' => rand(10000, 100000),
                'kategoris_id' => "1", 
                'suppliers_id' => rand(1, 7),
            ],


            [
                'nama' => 'kodein',
                'description' => '-',
                'form' => "tab 20 mg",
                'restriction' => "30 tab/bulan",
                'harga' => rand(10000, 100000),
                'kategoris_id' => "1", 
                'suppliers_id' => rand(1, 7),
            ],

            [
                'nama' => 'asam mefenamat',
                'description' => '-',
                'form' => "tab 500 mg",
                'restriction' => "30 tab/bulan",
                'harga' => rand(10000, 100000),
                'kategoris_id' => "2", 
                'suppliers_id' => rand(1, 7),
            ],

            [
                'nama' => 'ibuprofen*',
                'description' => '-',
                'form' => "susp 200 mg/5 mL",
                'restriction' => "1 btl/kasus",
                'harga' => rand(10000, 100000),
                'kategoris_id' => "2", 
                'suppliers_id' => rand(1, 7),
            ],

            [
                'nama' => 'ketoprofen',
                'description' => 'Untuk nyeri sedang sampai berat pada pasien yang tidak dapat menggunakan analgesik secara oral',
                'form' => "sup 100 mg",
                'restriction' => "2 sup/hari, maks 3 hari",
                'harga' => rand(10000, 100000),
                'kategoris_id' => "2", 
                'suppliers_id' => rand(1, 7),
            ],

            //3
            [
                'nama' => 'alopurinol',
                'description' => 'Tidak diberikan pada saat nyeri akut.',
                'form' => "tab 300 mg",
                'restriction' => "30 tab/bulan",
                'harga' => rand(10000, 100000),
                'kategoris_id' => "3", 
                'suppliers_id' => rand(1, 7),
            ],
        ]);
    }
}
