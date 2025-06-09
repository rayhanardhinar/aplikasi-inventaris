<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userUser = User::where('email', 'user2@gmail.com')->first();

        if ($userUser && !$userUser->hasRole('user')) {
            $userUser->assignRole('user');
            $this->command->info("Berhasil assign role user ke {$userUser->email}");
        } elseif (!$userUser) {
            $this->command->warn("User dengan email user2@gmail.com tidak ditemukan.");
        }
    }
}
