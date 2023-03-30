<?php

namespace Database\Seeders;

use App\Models\StatusBangunan;
use Database\Seeders\Inter\RTInterImportSeeder;
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
            // TestAccountSeeder::class,
        ]);
        $this->call([
            StatusBangunanSeeder::class
        ]);
        $this->call([
            // RTInterImportSeeder::class,
            BangunanSeeder::class
        ]);
        
    }
}
