<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'municipios'])->assignRole($role1);
        Permission::create(['name' => 'departamentos'])->assignRole($role1);
        Permission::create(['name' => 'documentos'])->assignRole($role1);
        Permission::create(['name' => 'generos'])->assignRole($role1);
        Permission::create(['name' => 'pacientes'])->syncRoles([$role1, $role2]);
    }
}
