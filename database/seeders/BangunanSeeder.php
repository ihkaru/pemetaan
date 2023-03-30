<?php

namespace Database\Seeders;

use App\Imports\BangunanImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class BangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(config('app.env')== "local") {
            Excel::import(new BangunanImport,'./database/data/Wilkerstat_small.csv',null,\Maatwebsite\Excel\Excel::CSV);
            return;
        }
    }
}
