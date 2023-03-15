<?php

namespace Database\Seeders;

use App\Models\Pemilih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemilih::factory(4000)->create();

    }
}
