<?php

namespace Database\Seeders\Inter;

use App\Imports\RTInterImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class RTInterImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(config('app.env')== "local") {
            Excel::import(new RTInterImport,'./database/data/Data Regsosek Per KK - Blok Bangunan.xlsx',null,\Maatwebsite\Excel\Excel::XLSX);
            return;
        }
    }
}
