<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            [
                'email' => 'testedev@mail.com',
            ],
            [
                'name' => 'TesteDev',
                'email' => 'testedev@mail.com',
                'password' => Hash::make('abc123'),
            ]);
    }
}
