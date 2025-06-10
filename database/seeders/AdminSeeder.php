<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Bos Buket Bengkalis',
            'username' => 'admin',
            'phone_number' => '000000000000',
            'address' => 'Jl. Pendidikan',
            'email' => 'admin@bosbuketbks.com',
            'password' => Hash::make('bosbuket@2025'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('Admin berhasil ditambahkan!');
    }
}
