<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'kategori.view']);
        Permission::create(['name' => 'kategori.create']);
        Permission::create(['name' => 'kategori.update']);
        Permission::create(['name' => 'kategori.delete']);

        Permission::create(['name' => 'produk.view']);
        Permission::create(['name' => 'produk.create']);
        Permission::create(['name' => 'produk.update']);
        Permission::create(['name' => 'produk.delete']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $kasir = Role::create(['name' => 'kasir']);
        $kasir->givePermissionTo(['produk.view']);
    }
}
