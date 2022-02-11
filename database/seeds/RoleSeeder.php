<?php

use Illuminate\Database\Seeder;
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
        Role::create([
            'name' => 'Admin Gudang',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Manager',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Kasir',
            'guard_name' => 'web'
        ]);
    }
}
