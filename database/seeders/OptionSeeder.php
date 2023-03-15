<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Pemilih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::create([
            "label"=>"Target Suara",
            "key"=>"TARGET_SUARA",
            "value"=>round(0.21*Pemilih::count()),
            "description"=>"Target suara pemilih yang ingin didapatkan",
        ]);
        Option::create([
            "label"=>"Gunakan tanda tangan",
            "key"=>"GUNAKAN-TANDA-TANGAN",
            "value"=>"1",
            "description"=>"Gunakan tanda tangan saat mencetak daftar pemilih terverifikasi"
        ]);
        Option::create([
            "label"=>"Penanda tangan",
            "key"=>"PENANDA-TANGAN-DAFTAR-PEMILIH",
            "value"=>"Pejabat Penanda Tangan",
            "description"=>"Nama penanda tangan cetakan daftar pemilih"
        ]);
    }
}
