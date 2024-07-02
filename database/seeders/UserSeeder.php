<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nguyen Duong',
            'email' => 'blogquantrimaytinh@gmail.com',
            'password' => '123456789',
            'role_id' => 1,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Pham Quynh',
            'email' => 'phamquynh@gmail.com',
            'password' => '123456789',
            'role_id' => 2,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Vu Thao',
            'email' => 'vuthao@gmail.com',
            'password' => '123456789',
            'role_id' => 3,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Vu Thuy',
            'email' => 'vuthuy@gmail.com',
            'password' => '123456789',
            'role_id' => 3,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Tran Huong',
            'email' => 'tranhuong@gmail.com',
            'password' => '123456789',
            'role_id' => 4,
            'email_verified_at' => now(),
        ]);
    }
}
