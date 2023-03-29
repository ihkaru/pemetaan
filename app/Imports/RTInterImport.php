<?php

namespace App\Imports;

use App\Models\Inter\RTInter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class RTInterImport implements ToModel, WithBatchInserts, WithUpserts, WithStartRow
{
    /**
    * @param array $row],
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $key = "R".str_pad(trim($row[0]),3,"0",STR_PAD_LEFT).
        str_pad(trim($row[1]),2,"0",STR_PAD_LEFT).
        str_pad(trim($row[2]),2,"0",STR_PAD_LEFT).
        str_pad(trim($row[3]),3,"0",STR_PAD_LEFT).
        str_pad(trim($row[4]),3,"0",STR_PAD_LEFT).
        str_pad(trim($row[5]),4,"0",STR_PAD_LEFT).
        str_pad(trim($row[6]),2,"0",STR_PAD_LEFT).
        str_pad(trim($row[7]),3,"0",STR_PAD_LEFT);

        if(strlen($key)>23){
            dd($key);
        }
        return new RTInter([
            'key'=>$key,
            'id_rt'=>trim($row[0]),
            'kode_prov'=>trim($row[1]),
            'kode_kab'=>trim($row[2]),
            'kode_kec'=>trim($row[3]),
            'kode_desa'=>trim($row[4]),
            'kode_sls'=>trim($row[5]),
            'kode_subsls'=>trim($row[6]),
            'r110'=>trim($row[7]),
            'namakrt_'=>trim($row[8]),
            'alamat_'=>trim($row[9]),
            'namaartkedua_'=>trim($row[10]),
            'r109'=>trim($row[11]),
            'r111'=>trim($row[12]),
            'r112'=>trim($row[13]),
            'r113'=>trim($row[14]),
            'r115'=>trim($row[16]),
            'r301a'=>trim($row[17]),
            'r301b'=>trim($row[18]),
            'r302'=>trim($row[19]),
            'r303'=>trim($row[20]),
            'r304'=>trim($row[21]),
            'r305'=>trim($row[22]),
            'r306a'=>trim($row[23]),
            'r306b'=>trim($row[24]),
            'r307a'=>trim($row[25]),
            'r307b1'=>trim($row[26]),
            'r308'=>trim($row[27]),
            'r309a'=>trim($row[28]),
            'r310'=>trim($row[29])
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
    public function uniqueBy()
    {
        return 'key';
    }
    public function batchSize(): int
    {
        return 1000;
    }

}
