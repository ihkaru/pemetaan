<?php

namespace Database\Seeders;

use App\Models\Pemilih;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jumlah = 20;
        // for($i=0;$i<$jumlah;$i++){
        //     $user = User::factory(1)->has(Pemilih::factory(rand(1,20)*10)->tertandai())->create()->first();
        //     $user->assignRole('relawan');
        // }
    }
}
