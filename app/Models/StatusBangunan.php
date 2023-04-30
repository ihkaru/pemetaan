<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBangunan extends Model
{
    use HasFactory;

    public static function convertId($value)
    {
        $stringToInt = [
            "Keluarga Sangat Miskin" => 1,
            'Keluarga Miskin' => 2,
            'Keluarga Tidak Miskin' => 3
        ];
        $intToString = [
            "1" => "Keluarga Sangat Miskin",
            "2" => "Keluarga Miskin",
            "3" => "Keluarga Tidak Miskin"
        ];

        if (!is_int($value)) return $stringToInt[$value];
        if (is_int($value)) return $intToString["" . $value];
    }
}