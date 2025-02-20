<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Wakasek',
                'username' => 'waka',
                'email' => 'waka@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'wakasek',
                'status' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'nama' => 'Admin 1',
                'username' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'status' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'nama' => 'Admin 2',
                'username' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'status' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ]);
    }
}
