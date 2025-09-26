<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CardMemberSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(ObatSeeder::class);
       
        $this->call(TransaksiSeeder::class);
        $this->call(DetailSeeder::class);
    }
}
