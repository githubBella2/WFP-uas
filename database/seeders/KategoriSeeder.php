<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Analgesik Narkotik', 'Analgesik Non Narkotik', 'Antipirai', 'Nyeri Neuropatik','Anestetik Lokal'
        , 'Anestetik Umum dan Oksigen', 'Obat untuk Prosedur Pre Operatif', 'Antialergi dan Obat untuk Anafilaksis'
        , 'Khusus', 'Umum', 'Antiepilepsi - Antikonvulsi'];
        foreach($arr as $c) {
            DB::table('kategoris')->insert([
                'nama'=>$c
            ]);
        }
    }
}
