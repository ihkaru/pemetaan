<?php

namespace App\Imports;

use App\Models\Bangunan;
use App\Models\StatusBangunan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class BangunanImport implements ToModel, WithBatchInserts, WithUpserts, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(strlen(trim($row[5]))>11) dd(trim($row[8]));
        return new Bangunan([
            'id'=>trim($row[0]),
            'kode_bangunan'=>trim($row[1]),
            'kode_sls'=>trim($row[2]),
            'latitude'=>trim($row[4]),
            'longitude'=>trim($row[5]),
            'accuracy'=>trim($row[6]),
            'status_bangunan_id'=> StatusBangunan::convertId(trim($row[7])),
            'id_desa'=>trim($row[8]),
            'photo_url'=>"/".trim($row[0]).".jpg"
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
    public function uniqueBy()
    {
        return 'id';
    }
    public function batchSize(): int
    {
        return 1000;
    }
    
    
}
