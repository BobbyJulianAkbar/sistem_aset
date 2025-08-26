<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'id'            => 1,
            'name'          => 'admin',
            'email'         => 'admin@admin.com',
            'password'      => Hash::make('admin'), // hashed password
            'jabatan'       => 2,
            'telp_staff'    => '0123456789',
            'status_staff'  => 1,
            'created_at'    => '2025-01-01 00:00:00',
            'updated_at'    => '2025-01-01 00:00:00',
        ]);
    }
}
