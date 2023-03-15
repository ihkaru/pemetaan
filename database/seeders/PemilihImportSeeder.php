<?php

namespace Database\Seeders;

use App\Models\Pemilih;
use Illuminate\Database\Seeder;


class PemilihImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('app.env')== "local") {
            Pemilih::importFromExcel("./database/data/dpt_sungairaya_limbung_fix.xlsx",null,false);
            return;
        }
        // if(env("APP_ENV") == "main") Pemilih::importFromExcel("../database/data/dpt_sungairaya_limbung_fix.xlsx",null,false);
        // $path=storage_path("app/public/dpt_sungairaya_limbung_fix.xlsx");
        $path="../public/storage/2023-02-23-dpt_sungairaya_limbung_fix.xlsx";
        if(!file_exists($path)) dd($path);
        // if(env("APP_ENV") == "main") Pemilih::importFromExcel($path,null,false);
    }
}
