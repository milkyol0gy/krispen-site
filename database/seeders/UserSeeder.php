<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Daniel Kristianto',
                'email' => 'c14220329@john.petra.ac.id',
            ],
            [
                'name' => 'Calvin Laguna',
                'email' => 'c14220261@john.petra.ac.id',
            ],
            [
                'name' => 'Darlene Sharon',
                'email' => 'c14220298@john.petra.ac.id',
            ],
            [
                'name' => 'Fransiska Felicia',
                'email' => 'c14220328@john.petra.ac.id',
            ],
            [
                'name' => 'Valencia Octaviany',
                'email' => 'c14220287@john.petra.ac.id',
            ],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}