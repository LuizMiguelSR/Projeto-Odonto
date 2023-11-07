<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        // Insere um usuário de exemplo
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'role' => 'admin',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Rosa Maria',
            'email' => 'rosa@email.com',
            'role' => 'user',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Luiz Miguel',
            'email' => 'luizmsr0@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
