<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
       User::create([
           'name' => 'admin',
           'email' => 'admin@admin.com',
           'password' => Hash::make('password')
       ]);
    }
}
