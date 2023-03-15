<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permissions = [
        //     [
        //         "name"=>"terima_relawan",
        //         "guard_name"=>"web",
        //     ],
        //     [
        //         "name"=>"verifikasi_tanda",
        //         "guard_name"=>"web",
        //     ],
        //     [
        //         "name"=>"upload_data_pemilih",
        //         "guard_name"=>"web",
        //     ],
        //     ];
        // Permission::insert($permissions);
        // foreach ($permissions as $p) {
        //     if($p["name"] == "verifikasi_tanda"){
        //         Role::where("name","relawan")->first()->givePermissionTo("verifikasi_tanda");
        //     }
        // }
    }
}
