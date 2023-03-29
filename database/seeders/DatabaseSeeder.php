<?php

namespace Database\Seeders;

use Database\Seeders\Inter\RTInterImportSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ShieldSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            RTInterImportSeeder::class
            // PemilihSeeder::class,
            // PemilihImportSeeder::class,
            // OptionSeeder::class,
            // TestAccountSeeder::class,

        ]);
    }
}
