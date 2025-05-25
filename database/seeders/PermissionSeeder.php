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
     */
    public function run(): void
    {
        // Buat roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Buat permissions
        $permissions = [
            'view dashboard',
            'view products',
            'manage products',    // Gabungan create, edit, delete products
            'view categories',
            'manage categories',  // Gabungan create, edit, delete categories
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permission ke role admin (full akses)
        $adminRole->syncPermissions($permissions);

        // Assign permission ke role user (hanya lihat)
        $userRole->syncPermissions(['view dashboard', 'view products', 'view categories']);
    }
}
