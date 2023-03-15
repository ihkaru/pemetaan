<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        // Role::create([

        //         "name" => 'relawan',
        //         'guard_name' => "web",
        //         'created_at' => $now,
        //         'updated_at' => $now,

        // ])
        // ->givePermissionTo([
        //     "view_any_pemilih",
        //     "tandai_pemilih",
        //     "widget_RelawanStats",
        //     "widget_PerformaRelawanChart",
        // ])
        // ;
        Role::create([
            "name" => 'super_admin',
            'guard_name' => "web",
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        Role::create([
            "name" => 'guest',
            'guard_name' => "web",
            'created_at' => $now,
            'updated_at' => $now,
        ]);

    }
}
