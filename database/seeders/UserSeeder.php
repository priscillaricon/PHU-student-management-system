<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Account
        User::firstOrCreate(
            ['email' => 'admin@phu.ac.ug'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // Student Accounts
        User::firstOrCreate(
            ['email' => 'priscillar@phu.ac.ug'],
            [
                'name' => 'Priscillar Nakabugo',
                'password' => Hash::make('password456'),
                'role' => 'student',
            ]
        );

        User::firstOrCreate(
            ['email' => 'daniel@phu.ac.ug'],
            [
                'name' => 'Mwesigwa Daniel Plan',
                'password' => Hash::make('password789'),
                'role' => 'student',
            ]
        );

        // Lecturer Accounts
        User::firstOrCreate(
            ['email' => 'bmutebi@phu.ac.ug'],
            [
                'name' => 'Mr. Mutebi Bashir',
                'password' => Hash::make('password1011'),
                'role' => 'lecturer',
            ]
        );

        User::firstOrCreate(
            ['email' => 'jdoe@phu.ac.ug'],
            [
                'name' => 'Dr. Jane Doe',
                'password' => Hash::make('password1213'),
                'role' => 'lecturer',
            ]
        );
    }
}
