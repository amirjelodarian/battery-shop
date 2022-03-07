<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->count(1)->create();
        $permission = Permission::whereName('storeProduct')->first();
        $role = Role::whereName('administrator')->first();
        $role->givePermissionTo($permission);
    }
}
