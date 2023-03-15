<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ShieldSeeder3 extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[
            {
                "name":"super_admin",
                "guard_name":"web",
                "permissions":[
                        "view_option","view_any_option","create_option","update_option","restore_option","restore_any_option","replicate_option","reorder_option","delete_option","delete_any_option","force_delete_option","force_delete_any_option","view_pemilih","view_any_pemilih","create_pemilih","update_pemilih","restore_pemilih","restore_any_pemilih","replicate_pemilih","reorder_pemilih","delete_pemilih","delete_any_pemilih","force_delete_pemilih","force_delete_any_pemilih","view_role","view_any_role","create_role","update_role","restore_role","restore_any_role","replicate_role","reorder_role","delete_role","delete_any_role","force_delete_role","force_delete_any_role","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","widget_RelawanStats"
                    ]
            },
            {
                "name":"filament_user",
                "guard_name":"web",
                "permissions":[]
            }
        ]';
        $directPermissions = '[]';

        static::makeRolesWithPemrissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPemrissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions,true))) {

            foreach ($rolePlusPermissions as $rolePlusPermission) {

                $role = Role::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name']
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    foreach($rolePlusPermission['permissions'] as $p){
                        if (Permission::whereName($p)->doesntExist()) {
                            Permission::create([
                                'name' => $p,
                                'guard_name' => $rolePlusPermission['guard_name'],
                            ]);
                        }
                    }
                    $role->givePermissionTo($rolePlusPermission['permissions']);

                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions,true))) {

            foreach($permissions as $permission) {

                if (Permission::whereName($permission)->doesntExist()) {
                    Permission::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
