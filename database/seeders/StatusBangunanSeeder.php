<?php

namespace Database\Seeders;

use App\Models\StatusBangunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusBangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        StatusBangunan::insert([
            [
                'id'=> 1,
                'nama'=>'Keluarga Sangat Miskin',
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'id'=> 2,
                'nama'=>'Keluarga Miskin',
                'created_at'=>$now,
                'updated_at'=>$now
            ],
            [
                'id'=> 3,
                'nama'=>'Keluarga Tidak Miskin',
                'created_at'=>$now,
                'updated_at'=>$now
            ],
        ]);
    }
}
