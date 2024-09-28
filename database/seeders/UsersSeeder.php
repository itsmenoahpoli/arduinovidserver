<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'client'];

        foreach ($roles as $role) {
            User::query()->create([
                'name' => $role.' account',
                'email' => $role . '@domain.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
