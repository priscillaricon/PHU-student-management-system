<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
      // Admin Account
        User::create([
            'name' => 'System Admin',
            'email' => 'admin@phu.ac.ug',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Student Account
        User::create([
            'name' => 'Priscillar Nakabugo',
            'email' => 'priscillar@phu.ac.ug',
            'password' => Hash::make('password456'),
             'role' => 'student',
        ]);

        User::create([
            'name' => 'Mwesigwa Daniel Plan',
            'email' => 'daniel@phu.ac.ug',
            'password' => Hash::make('password789'),
            'role' => 'student',
            
        ]);


        //lecturerAccount
    
        User::create([
            'name' => 'Mr. Mutebi Bashir',
            'email' => 'bmutebi@phu.ac.ug',
            'password' => Hash::make('password1011'),
            'role' => 'lecturer',
            
        ]);

        User::create([
            'name' => 'Dr. Jane Doe',
            'email' => 'jdoe@phu.ac.ug',
            'password' => Hash::make('password1213'),
            'role' => 'lecturer',
        
        ]);
      
    }
}
