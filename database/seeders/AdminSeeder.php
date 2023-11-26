<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('admins')->insert([
            [
                'name' => 'Jaka',
                'role' => 'super_admin',
                'password' => Hash::make('superadmin')
            ],
            [
                'name' => 'Dewi',
                'role' => 'admin',
                'password' => Hash::make('admin')
            ]
        ]);
    }
}
