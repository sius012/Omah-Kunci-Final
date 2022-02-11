<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kasir = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@role.tes',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('Kasir');

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@role.tes',
            'password' => bcrypt('12345678'),
        ]);

        $manager->assignRole('Manager');

        $admingudang = User::create([
            'name' => 'Admin Gudang',
            'email' => 'admingudang@role.tes',
            'password' => bcrypt('12345678'),
        ]);

        $admingudang->assignRole('Admin Gudang');
    }
}
